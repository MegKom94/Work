<?php
namespace App\Http\Api\v1\system\admin\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\admin\Entities\ModelsEntity;
use App\Http\Api\v1\system\admin\Patterns;
use App\Http\sources\Mixin;
use App\Models\InformationSchema;
use App\Models\ApiModels;


class ModelsController extends Controller{
    use Patterns;
    use Mixin;

    function index(Request $request){       
        $modelsEntity = new ModelsEntity;
        return $modelsEntity::get($request->all());
    }

    function store(Request $request){
        $array = $request->all(); 

        $modelPath = '/var/www/html/app/Models/';
        if(isset($array["id_ApiModels"])){
            if(isset($array["is_deleted"]) && $array['is_deleted'] == 1){
                $modelsEntity = new ModelsEntity;
                $response =  $modelsEntity::set($array);
                $res = $response->original;
    
                if($res['status'] == 'updated'){
                    $nameModel = ApiModels::findOrFail($array["id_ApiModels"])->toArray()['name_model'];
                    unlink($modelPath.$nameModel.'.php');
                }
            }
            else{
                $apiModels = ApiModels::findOrFail($array["id_ApiModels"])->toArray();
                self::createModel($modelPath, $array + ['name_table'=>$apiModels['name_table'], 'name_model'=>$apiModels['name_model']]);
                return ['status'=>'updated'];
            }
        }
        else{
            $modelsEntity = new ModelsEntity;
            $response =  $modelsEntity::set($array);
            $res = $response->original;

            if($res['status'] == 'inserted'){
                self::createModel($modelPath, $array);
            }
        }

        return $response;
    }

    function show($id){
        $modelsEntity = new ModelsEntity;
        return $modelsEntity::get($id);
    }

    private static function createModel($modelPath, $array){
        $informationSchema = InformationSchema::with(['ApiModels','ApiModelsRef'])->selectRaw('TABLE_SCHEMA,TABLE_NAME,COLUMN_NAME,REFERENCED_TABLE_SCHEMA, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME')-> 
        whereNotNull('REFERENCED_TABLE_NAME')->where(function ($query) use ($array){
            $query->where('TABLE_NAME', $array['name_table'])->orWhere('REFERENCED_TABLE_NAME', $array['name_table']);
        })->get()->toArray();

        $relationship = [];
        foreach($informationSchema as $item){
            if($item['TABLE_NAME'] == $array['name_table']){
                if(isset($item['api_models_ref'][0]) && ApiModels::selectRaw('name_model')->where('name_model', $item['api_models_ref'][0]['name_model'])->exists()){
                    $relationship += [$item['api_models_ref'][0]['name_model']=>['class'=>$item['api_models_ref'][0]['name_model'].'::class']];

                    $relationship[$item['api_models_ref'][0]['name_model']] += ['0'=>$item['REFERENCED_COLUMN_NAME']];
                    $relationship[$item['api_models_ref'][0]['name_model']] += ['1'=>$item['COLUMN_NAME']];
                }
            }
            elseif(isset($item['api_models'][0]) && $item['REFERENCED_TABLE_NAME'] == $array['name_table']){
                if(ApiModels::selectRaw('name_model')->where('name_model', $item['api_models'][0]['name_model'])->exists()){
                    $relationship += [$item['api_models'][0]['name_model']=>['class'=>$item['api_models'][0]['name_model']."::class"]];

                    $relationship[$item['api_models'][0]['name_model']] += ['0'=>$item['COLUMN_NAME']];
                    $relationship[$item['api_models'][0]['name_model']] += ['1'=>$item['REFERENCED_COLUMN_NAME']]; 
                }
            }
        }
        self::inFile($modelPath.$array['name_model'].'.php', self::patternModel($array['name_model'], $array['name_table'], $relationship));
    }
}