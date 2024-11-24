<?php

namespace App\Exceptions;

use Exception;

class Token extends Exception{
    private $status;

    function __construct($message, $status) {
        $this->message = $message;
        $this->status = $status;
    }

    function render($request){
        return response()->json([
            'Error' => $this->getMessage()
        ])->setStatusCode($this->status);
    }
}