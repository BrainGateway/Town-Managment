<?php

namespace Modules\Notifier\Http\Helpers;

use Illuminate\Http\Request;

class General
{
    public static function getSwitchRequestValues(Request $request, $switches)
    {
        if(empty($switches))
        {
            return [];
        }

        $switchRequest = [];

        foreach($switches as $switch)
        {
            if($request->has($switch) && $request->get($switch) != 'null')
            {
                $switchRequest[$switch] = ($request->get($switch) == 'true' || (int)$request->get($switch) == 1)? 1:0;

            }
            else
            {
                $switchRequest[$switch] = 0;
            }
        }
        return $switchRequest;
    }

    public static function getRequestData(Request $request, $inputs)
    {
        if(empty($input))
        {
            return [];
        }
        $inputFilter = [];

        foreach ($inputs as $input)
        {
            $inputFilter[] = $request->get($input);
        }

        return $inputFilter;
    }

    public static function getCountryName($slug) {
        $countries = config('countries');
        if(isset($countries[strtoupper($slug)])) {
            return $countries[$slug];
        }

        return '';
    }

    /*
	* This method will help us to parse Blade templates retreived from db
	*
	* @param $string (string) The conent text that needs to be parsed
	* @param $args (array) The array set which is used within blade template
	*
	* @return $content (string) The parsed string
	*/
    public static function parseBladeCode( $string, array $args = array() ) {

        $generated = \Blade::compileString( $string );

        ob_start();
        extract( $args, EXTR_SKIP );

        try {
            eval( '?>' . $generated );
            $content = ob_get_clean();

            return html_entity_decode( $content );
        } catch ( \Exception $e ) {
            ob_get_clean();
            throw $e;
            $content = ob_get_clean();

            return html_entity_decode( $content );
        }
    }


}

