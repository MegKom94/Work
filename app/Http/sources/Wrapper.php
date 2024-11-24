<?php

namespace App\Http\sources;

use OpenApi\Attributes as OAT;

trait Wrapper{

    #[OAT\Schema(
        schema: 'Paginator',
        properties: [
            new OAT\Property(property: 'current_page', type: 'int', format: 'int', example: '1'),
            new OAT\Property(property: 'from', type: 'int', format: 'int', example: '1'),
            new OAT\Property(property: 'last_page', type: 'int', format: 'int', example: '380'),
            new OAT\Property(property: 'per_page', type: 'int', format: 'int', example: '30'),
            new OAT\Property(property: 'to', type: 'int', format: 'int', example: '30'),
            new OAT\Property(property: 'total', type: 'int', format: 'int', example: '11371'),
        ]
    )]
    function toArray(): array
    {
        return [
            'status'=> 'Successfully',
            'paginator' => [
                'current_page' => $this->currentPage(),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'to' => $this->lastItem(),
                'total' => $this->total(),
            ],
            'data'=>$this->items,
        ];
    }

    static function _response($response, $statusCode = 200){
        $status = (in_array($statusCode, [200, 201, 304]) ? 'Successfully': 'Error');
        if($response instanceof Paginator) return response($response)->setStatusCode($statusCode);
        else
        
        return response([
            'status'=> $status,
            'data'=> $response,

        ])->setStatusCode($statusCode);
    }
}