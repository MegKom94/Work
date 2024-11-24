<?php

namespace App\Http\sources;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Events\Logs\LogsEvent;
use App\Exceptions\Exceptions;
use App\Http\sources\Wrapper;
use Illuminate\Http\Request;
use App\Http\sources\Logs;
 
class ResourceController extends BaseController{
    use Wrapper;

    private $validation;
    private $system;
    private $targetController;

    public $create_log = true;
    public $change_log = true;
    public $delete_log = true;

    function getList($request){ return; }
    function getOne(string $id){ return; }
    function create($request){ return; }
    function change($request, string $id){ return; }
    function delete($request, string $id){ return; }

    function __construct(){
        $this->validation = get_class($this);
        
        $this->targetController = explode('\\', $this->validation);
        $this->targetController = end($this->targetController);
        $this->system = str_replace('Controller', '', $this->targetController);
    }



    function index(Request $request){ 
        return $this->getList($request);
        // return self::_response($this->getList($request), 200);
    }
    
    function show(string $id){
        // return self::_response($this->getOne($id), 200);
        return $this->getOne($id);
    }

    function store(Request $request){
        $this->validation = $this->exist(str_replace('Controllers\\'.$this->targetController, 'Requests\\'.$this->system.'CreateRequest', $this->validation));
        if($this->validation !== false) app($this->validation);
        
        return self::_response($this->wrapp('create', $request), 200);
    }

    function update(Request $request, string $id){
        $this->validation = $this->exist(str_replace('Controllers\\'.$this->targetController, 'Requests\\'.$this->system.'ChangeRequest', $this->validation));
        if($this->validation !== false) app($this->validation);

        return self::_response($this->wrapp('change', $request, $id), 200);
    }

    function destroy(string $id){
        $request = request();

        $this->validation = $this->exist(str_replace('Controllers\\'.$this->targetController, 'Requests\\'.$this->system.'DeleteRequest', $this->validation));
        if($this->validation !== false) app($this->validation);

        return self::_response($this->wrapp('delete', $request, $id), 200);
    }


    private function wrapp($name, $request, $id = null){
        $response = null;
        
        try {
            $name_log = "{$name}_log";
           
            DB::transaction(function() use ($name, $request, $id, &$response) {
                if(isset($id)) $response = $this->$name($request, $id);
                else $this->$name($request);
            });

            LogsEvent::dispatchIf($this->$name_log, new Logs("{$name}d", $request->all(), $response));

        } catch (\Throwable $th) {
            LogsEvent::dispatchIf($this->$name_log, new Logs("no {$name}d", $request->all(), $th->getMessage()));

            throw new Exceptions($th->getMessage(), 400);
        }

        return $response;
    }


    
    private function exist($className){
        try{
            new $className;
            return $className;
        }
        catch(\Throwable $th){
            return false;
        }
    }
    
    private static function choice(Request $request):mixed {
        switch($request->input('method')){
            case 'post': return ['method'=>'create', 'request'=>'Create'];
            case 'patch': return ['method'=>'change', 'request'=>'Change'];
            case 'delete': return ['method'=>'delete', 'request'=>'Delete'];
            default: return ['method'=>'create', 'request'=>'Create'];
        }
    }

    private function cacheDelete($key){
        $response = DB::table('cache')->where('key', 'like', $key);
        $response->delete();
    }
}