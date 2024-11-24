<?php
namespace App\Http\Api\v2\system\example\Controllers;

use App\Transformers\AppTransformer;
use App\Http\sources\Controller;
use OpenApi\Attributes as OAT;
use App\Models\App;


class AppController extends Controller{
    
    #[OAT\Get(
        path: '/example/app',
        summary: 'Тестовый url получающий заявления',
        description: 'Тестовый url получающий заявления',
        tags: ['example'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Успешно',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Successfully'),
                    new OAT\Property(property: 'paginator', ref: '#/components/schemas/Paginator'),
                    new OAT\Property(property: 'data', type: 'array', items: new OAT\Items(ref: '#/components/schemas/AppTransformer'))
                ])
            ),
            new OAT\Response(
                response: 500,
                description: 'Ошибка',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Error'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'Message', type: 'string', format: 'string', example: 'syntax error, unexpected token "}"'),
                        new OAT\Property(property: 'Info', ref: '#/components/schemas/Error'),
                    ])
                ])
            ),
        ],
        
    )]
    function getList($request){
        // sleep(10);
        $app = App::select('*')->configure($request->only(['query', 'order', 'per_page', 'page']))->paginate();

        return new AppTransformer($app);
    }

    #[OAT\Get(
        path: '/example/app/{id}',
        summary: 'Тестовый url получающий заявление',
        description: 'Тестовый url получающий заявление',
        tags: ['example'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Успешно',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Successfully'),
                    new OAT\Property(property: 'paginator', ref: '#/components/schemas/Paginator'),
                    new OAT\Property(property: 'data', type: 'array', items: new OAT\Items(ref: '#/components/schemas/AppTransformer'))
                ])
            ),
            new OAT\Response(
                response: 500,
                description: 'Ошибка',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Error'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'Message', type: 'string', format: 'string', example: 'syntax error, unexpected token "}"'),
                        new OAT\Property(property: 'Info', ref: '#/components/schemas/Error'),
                    ])
                ])
            ),
        ]
    )]
    function getOne(string $id){
        $app = App::find($id);

        return new AppTransformer($app);
    }

    #[OAT\Post(
        path: '/example/app',
        summary: 'Тестовый url для создание заявления',
        description: 'Тестовый url для создание заявления',
        tags: ['example'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Успешно',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Successfully'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'id', type: 'int', format: 'int', example: 1),
                    ])
                ])
            ),
            new OAT\Response(
                response: 500,
                description: 'Ошибка',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Error'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'Message', type: 'string', format: 'string', example: 'syntax error, unexpected token "}"'),
                        new OAT\Property(property: 'Info', ref: '#/components/schemas/Error'),
                    ])
                ])
            ),
        ],
        parameters: [new OAT\RequestBody(ref: "#/components/requestBodies/AppCreateRequest")]
    )]
    function create($request){
        return [
            'id'=>App::insertGetId($request->all()),
        ];
    }

    #[OAT\Patch(
        path: '/example/app',
        summary: 'Тестовый url для изменения заявления',
        description: 'Тестовый url для изменения заявления',
        tags: ['example'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Успешно',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Successfully'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'id', type: 'int', format: 'int', example: 1),
                    ])
                ])
            ),
            new OAT\Response(
                response: 500,
                description: 'Ошибка',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Error'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'Message', type: 'string', format: 'string', example: 'syntax error, unexpected token "}"'),
                        new OAT\Property(property: 'Info', ref: '#/components/schemas/Error'),
                    ])
                ])
            ),
        ],
        parameters: [new OAT\RequestBody(ref: "#/components/requestBodies/AppChangeRequest")]
    )]
    function change($request, string $id){ 
        App::where('id', $id)->update($request->all());
        
        return [
            'id'=>$id,
        ];
    }
    
    #[OAT\Delete(
        path: '/example/app',
        summary: 'Тестовый url для удаления заявления',
        description: 'Тестовый url для удаления заявления',
        tags: ['example'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Успешно',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Successfully'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'id', type: 'int', format: 'int', example: 1),
                    ])
                ])
            ),
            new OAT\Response(
                response: 500,
                description: 'Ошибка',
                content: new OAT\JsonContent(properties: [
                    new OAT\Property(property: 'status', type: 'string', format: 'string', example: 'Error'),
                    new OAT\Property(property: 'data', properties: [
                        new OAT\Property(property: 'Message', type: 'string', format: 'string', example: 'syntax error, unexpected token "}"'),
                        new OAT\Property(property: 'Info', ref: '#/components/schemas/Error'),
                    ])
                ])
            ),
        ],
    )]
    function delete($request, string $id){ 
        App::where('id', $id)->delete();
        // App::where('id', $id)->restore();
        return [
            'id'=>$id,
        ];
    }

    function test(App $app){
        if($app->trashed()) echo 'Удалён'."\n\n";
        else echo 'Не удалён'."\n\n";

        return $app; 
    }
}