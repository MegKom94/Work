<?php

namespace App\Transformers;


use OpenApi\Attributes as OAT;
use App\Http\sources\Transformer;
use Illuminate\Http\Request;

class AppTransformer extends Transformer
{
    
    #[OAT\Schema(
        schema: 'AppTransformer',
        properties: [
            new OAT\Property(property: 'id', type: 'int', format: 'int', example: '1'),
            new OAT\Property(property: 'id_execution', type: 'int', format: 'int', example: '123456'),
            new OAT\Property(property: 'id_level', type: 'int', format: 'int', example: '2'),
            new OAT\Property(property: 'is_budget', type: 'int', format: 'int', example: '1'),
            new OAT\Property(property: 'id_source', type: 'int', format: 'int', example: '4'),
            new OAT\Property(property: 'guid_app', type: 'string', format: 'string', example: 'df4r3-g43ffg4-ds32dg-h5h5'),
            new OAT\Property(property: 'is_original', type: 'int', format: 'int', example: '0'),
        ]
    )]
    /**
     * @param App $object
     * @param Request $request
     * @return array
     */
    public function transform($object, Request $request)
    {
        $response = [
            'id' => (int)$object->id,
            'id_execution' => (int)$object->id_execution,
            'id_level'=> (int)$object->id_level,
            'is_budget'=> (int)$object->is_budget,
            'id_source'=> (int)$object->id_source,
            'guid_app'=> (string)$object->guid_app,
            'is_original'=> (int)$object->is_original,
        ];
        // если передан дополнительный параметр, в этом случае переданы ответы
        // if ($this->needAppend('forms')) {
        //     $response['forms'] = (new FormTransformer(
        //         $object->forms,
        //         $this->getNestedAppends('forms')
        //     ))->toArray($request);
        // }
        return $response;
    }

}