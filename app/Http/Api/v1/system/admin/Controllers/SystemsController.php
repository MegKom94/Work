<?php
namespace App\Http\Api\v1\system\admin\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\sources\Mixin;
use App\Http\Api\v1\system\admin\Entities\SystemsEntity;
use App\Models\ApiSystems;
use App\Models\ApiEntities;
use App\Http\Api\v1\system\admin\Patterns;


class SystemsController extends Controller{
    use Mixin;
    use Patterns;

    function index(Request $request){
        $systemsEntity = new SystemsEntity;
        return $systemsEntity::get($request->all());
    }

    function store(Request $request){
        $systemsEntity = new SystemsEntity;
        $array = $request->all();
        $response = $systemsEntity::set($array);
        $res = $response->original;
        $path = '/var/www/html/app/Http/Api/v1/system/';
        $pathRoutes = '/var/www/html/routes/api.php';

        if($res['status'] == 'inserted'){
            self::crdir($path.$array['name_en']);
        }
        elseif($res['status'] == 'updated' && isset($array['is_deleted'])){
            if($array['is_deleted'] == 1){
                $systemName = ApiSystems::findOrFail($array['id_ApiSystems'])->toArray()['name_en'];
                $entities = ApiEntities::where('id_system', $array['id_ApiSystems'])->get()->toArray();
                self::deldir($path.$systemName);

                foreach($entities as $entity){
                    self::inFile($pathRoutes, self::patternApiDelete($systemName, $entity['name'], self::fromFile($pathRoutes)));
                }
            }
        }

        return $response;
    }

    function show($id){
        $systemsEntity = new SystemsEntity;
        return $systemsEntity::get($id);
    }

    static private function crdir($path){
        mkdir($path);
        chmod($path, 0777);

        mkdir($path.'/Controllers');
        chmod($path.'/Controllers', 0777);

        mkdir($path.'/Entities');
        chmod($path.'/Entities', 0777);

        mkdir($path.'/Resources');
        chmod($path.'/Resources', 0777);
    }
}