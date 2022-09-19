<?php


namespace App\Http\Controllers\TraitClasses;


use Illuminate\Support\Facades\Session;

trait SessionTrait
{

    protected static function customSessionMessage($code, $status, $message){
        $msgArray = [
            "code"  => $code,
            "status"    => $status,
            "message"   => $message,
        ];
        return $msgArray;
    }

}
