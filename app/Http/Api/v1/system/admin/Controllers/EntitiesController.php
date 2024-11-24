<?php
namespace App\Http\Api\v1\system\admin\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\admin\Entities\EntitiesEntity;
use App\Http\Api\v1\system\admin\Patterns;
use App\Http\sources\Mixin;
use App\Models\ApiSystems;
use App\Models\ApiModels;
use App\Models\ApiEntities;



class EntitiesController extends Controller{
    use Mixin;
    use Patterns;
    
    function index(Request $request){
        $entitiesEntity = new EntitiesEntity;
        return $entitiesEntity::get($request->all());
    }

    function store(Request $request){
        $entitiesEntity = new EntitiesEntity;
        $array = $request->all();

        $response = $entitiesEntity::set($array); 
        $res = $response->original;

        $path = '/var/www/html/app/Http/Api/v1/system/';
        $pathRoutes = '/var/www/html/routes/api.php';

        if($res['status'] == 'inserted'){
            $nameEntity = self::searchKey(['name'], $array);
            $idSystem  = self::searchKey(['id_system'], $array);
            $modelList = self::searchKey(['modelList'], $array);

            if($nameEntity !== null && $idSystem !== null && $modelList !== null){
                $systemName = ApiSystems::findOrFail($idSystem['id_system'])->toArray()['name_en'];
                $nameEntity = ucfirst(strtolower($nameEntity['name']));
                $path .= $systemName.'/';
                $modelList = $modelList['modelList'];
                $modelListTmp = ApiModels::selectRaw('id, name_model')->whereIn('id', $modelList)->get()->toArray();
                
                foreach($modelList as &$model){
                    foreach($modelListTmp as $modelTmp) if($model == $modelTmp['id']) $model = $modelTmp['name_model'];
                }

                self::inFile($path.'Controllers/'.$nameEntity.'Controller.php', self::patternController($systemName, $nameEntity));
                self::inFile($path.'Entities/'.$nameEntity.'Entity.php', self::patternEntity($systemName, $nameEntity, $modelList));
                self::inFile($path.'Resources/'.$nameEntity.$modelList[0].'Resource.php', self::patternResource($systemName, $nameEntity, $modelList[0]));
                self::inFile($pathRoutes, self::patternApi($systemName, $nameEntity, self::fromFile($pathRoutes)));
            }
        }
        elseif($res['status'] == 'updated' && isset($array['is_deleted'])){
            if($array['is_deleted'] == 1){
                $apiEntities = ApiEntities::with('ApiModels')->findOrFail($array['id_ApiEntities'])->toArray();
                $apiEntities += ['main_model'=>$apiEntities["api_models"][0]['name_model']];
                unset($apiEntities['api_models']);

                $systemName = ApiSystems::findOrFail($apiEntities['id_system'])->toArray()['name_en'];
                $path .= $systemName.'/';

                unlink($path.'Controllers/'.$apiEntities['name'].'Controller.php');
                unlink($path.'Entities/'.$apiEntities['name'].'Entity.php');
                unlink($path.'Resources/'.$apiEntities['name'].$apiEntities['main_model'].'Resource.php');

                self::inFile($pathRoutes, self::patternApiDelete($systemName, $apiEntities['name'], self::fromFile($pathRoutes)));
            }
        }

        return $response;
    }

    function show($id){
        $entitiesEntity = new EntitiesEntity;
        return $entitiesEntity::get($id);
    }
}