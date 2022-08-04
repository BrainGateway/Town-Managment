<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\AllowedCountries;
use App\Models\CbtCountryRelation;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Arr;
class Helpers
{

    public static function loggedInUserObject()
    {
        $query = User::where("id", auth()->user()->id);
        $user = $query->first();
        return $user;
    }
    public static function  loggedInUserCountry()
    {
        $countryArray = [
            "country_id"        => null,
            "country_code"      => null,
            "country_name"      => null,
        ];
        return $countryArray;
    }
    public static function checkLoggedInUserAssignedCountry( $loggedInUserCountryId = null )
    {
        if( !empty($loggedInUserCountryId) ){
            $user = auth()->user();
            $userCountryArray = ($user->country_ids) ? json_decode($user->country_ids) : array();

            $userAssignedCountryList = $userCountryArray;
            if( (in_array($loggedInUserCountryId, $userAssignedCountryList) === true) ){
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    public static function loggedInUserRole()
    {
        $user = auth()->user();
        $getUserRole = "";
        return $getUserRole;
    }

}

