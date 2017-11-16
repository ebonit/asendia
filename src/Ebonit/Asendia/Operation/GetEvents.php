<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;


class GetEvents
{
    
    private static $ParcelReference = NULL;
    private static $EventDateFrom = NULL;
    private static $EventDateTo = NULL;
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            self::$$k = $v;
        }
        $array['ParcelReference'] = self::$ParcelReference;
        $array['EventDateFrom'] = self::$EventDateFrom;
        $array['EventDateTo'] = self::$EventDateTo;
        return $array;
    }
}