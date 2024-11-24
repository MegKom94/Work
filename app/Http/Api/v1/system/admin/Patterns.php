<?php
namespace App\Http\Api\v1\system\admin;
use Schema;

trait Patterns{
    static private $path = 'App\\Http\\Api\\v1\\system\\';
    static private $sourcePath = 'App\\Http\\sources\\';
    static private $modelPath = 'App\\Models\\';

    static protected function patternController($systemName, $name){
        return '<?php
namespace '.self::$path.$systemName.'\\Controllers;

use Illuminate\Http\Request;
use '.self::$sourcePath.'Controller;
use '.self::$path.$systemName.'\\Entities\\'.$name.'Entity;



class '.$name.'Controller extends Controller{
    
    function index(Request $request){
        $'.lcfirst($name).'Entity = new '.$name.'Entity;
        return $'.lcfirst($name).'Entity::get($request->all());
    }

    function store(Request $request){
        $'.lcfirst($name).'Entity = new '.$name.'Entity;
        return $'.lcfirst($name).'Entity::set($request->all());
    }

    function show($id){
        $'.lcfirst($name).'Entity = new '.$name.'Entity;
        return $'.lcfirst($name).'Entity::get($id);
    }
}';      
    }

    static protected function patternEntity($systemName, $name, $modelList){
        $models = 'self::$models = ['."\n";
        foreach($modelList as $model){
            $models .= "\t\t\t'".$model."',\n";
        }
        $models .= "\t\t];";

        return '<?php
namespace '.self::$path.$systemName.'\\Entities;

use '.self::$sourcePath.'Entity;

class '.$name.'Entity extends Entity{
    function __construct() {
        '.$models.'

        self::$nameResource = "'.$name.$modelList[0].'";
    }
}';      
    }

    static protected function patternResource($systemName, $name, $madelMain){
        $model = self::$modelPath.$madelMain;
        $model = new $model;
        $fieldsList = Schema::getColumnListing($model->table);

        $fields = '['."\n";
        foreach($fieldsList as $field){
            $fields .= "\t\t\t'".$field."'=>".'$this->'.$field.",\n";
        }
        $fields .= "\t\t];";



        return '<?php
namespace '.self::$path.$systemName.'\\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class '.$name.$madelMain.'Resource extends JsonResource{

    function toArray($request){
        return '.$fields.'
    }
}';
    }


    static protected function patternApi($systemName, $name, $text, $version = 'v1'){
        $route = "Route::apiResources([
    '".$version."/".$systemName."/".lcfirst($name)."'=>".$name."Controller::class,
]);";

        $text = "<?php\r\nuse ".self::$path.$systemName.'\\Controllers\\'.$name.'Controller;'.explode("<?php", $text)[1]."\r\n\r\n".$route;
        return $text;
    }

    static protected function patternApiDelete($systemName, $name, $text, $version = 'v1'){
        $text = str_replace("\r\nuse ".self::$path.$systemName.'\\Controllers\\'.$name."Controller;", '', $text);

        $text = str_replace("\r\n\r\nRoute::apiResources([
    '".$version."/".$systemName."/".lcfirst($name)."'=>".$name."Controller::class,
]);", '', $text);

        //echo nl2br($text);
        
        return $text;
    }

    static protected function patternModel($modelName, $tableName, $relationship){
        $uses = "namespace ".substr(self::$modelPath, 0, strlen(self::$modelPath) - 1).";\r\n\r\nuse Illuminate\Database\Eloquent\Model;\r\n";
        $relationshipText = "\t\treturn [\r\n";
        $functions = "";

        foreach($relationship as $key=>$item){
            $uses .= "use ".self::$modelPath.$key.";\r\n";

            $relationshipText .= "\t\t\t'".$key."'=>[\r\n\t\t\t\t";
            $relationshipText .= "'class'=>".$item['class'].",\r\n\t\t\t\t";
            $relationshipText .= "'0'=>'".$item['0']."',\r\n\t\t\t\t";
            $relationshipText .= "'1'=>'".$item['1']."',\r\n\t\t\t],\r\n";

            $functions .= "\r\n\tfunction ".explode('::class',$item['class'])[0]."(){\r\n\t\t".'$model = '."'".explode('::class',$item['class'])[0]."'".";\r\n\t\t".'return $this->hasMany(self::relationship()[$model][\'class\'], self::relationship()[$model][\'0\'], self::relationship()[$model][\'1\']);'."\r\n\t}\r\n";
        }
        $relationshipText .= "\t\t];";


        return "<?php\r\n\r\n".$uses."\r\nclass ".$modelName." extends Model{\r\n\t".'public $table = '."'".$tableName."'".';'."\r\n\t"."public \$timestamps = false;\r\n\r\n\tstatic function relationship(){\r\n".$relationshipText."\r\n\t}\r\n".$functions."}";
    }
}
