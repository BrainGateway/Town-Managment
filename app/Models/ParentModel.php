<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ParentModel extends Model
{
    use HasFactory;

    // private static $data;
    public static function boot() {

        parent::boot();
        // $temp_data = (object)[];
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($item) {


        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::created(function($item) {
            /*
                Write Logic Here
            */

            if((int)Auth::id()){ // if not cronjob
                $class=str_replace('App\\Models\\',"",get_class($item));
                ActionLogs::create(['user_id'=>Auth::id(),'path'=>$_SERVER['REDIRECT_URL'],'logdata'=>'Created record '.$class,'record_id'=>$item->id,'data'=>$item->attributes]);
            }
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updating(function($item) {

            // if((int)Auth::id()){ // if not cronjob
            //     $class=str_replace('App\\Models\\',"",get_class($item));
            //     ActionLogs::create(['user_id'=>Auth::id(),'path'=>$_SERVER['REDIRECT_URL'],'logdata'=>'Before Updated record '.$class,'record_id'=>$item->id,'data'=>$item->attributes]);
            // }
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updated(function($item) {
            /*
                Write Logic Here
            */
            if((int)Auth::id()){ // if not cronjob
                $class=str_replace('App\\Models\\',"",get_class($item));
                ActionLogs::create(['user_id'=>Auth::id(),'path'=>$_SERVER['REDIRECT_URL'],'logdata'=>'Updated record '.$class,'record_id'=>$item->id,'data'=>['new'=>$item->getDirty(),'old'=>$item->original]]);
            }

        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::deleted(function($item) {
            if((int)Auth::id()){ // if not cronjob
                $class=str_replace('App\\Models\\',"",get_class($item));
                ActionLogs::create(['user_id'=>Auth::id(),'path'=>$_SERVER['REDIRECT_URL'],'logdata'=>'Delete record '.$class,'record_id'=>$item->id]);
            }
        });
    }
}
