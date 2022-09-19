<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends ParentModel
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'countries';
    protected $fillable = ['marketplace_id','shipox_id','code','name','name_ar','lat','lng','currency','bank_account_type','sort_name','sort_order','conversion_rate','status','country_custom','country_vat','payment_methods','cod_charges'];

    protected $casts = [
        'payment_methods' =>'json',
    ];

    public function storeData($input)
    {
        return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
    public static function paymentMethods()
    {
        return [
            'cod'   => 'COD',
            'cc'    => 'Credit Card',
            'ap'    => 'Apple Pay'
        ];
    }
}
