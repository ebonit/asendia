<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

class ItemInformation
{
    
    public static $Weight = 0.03;    
    public static $Format = 'N';
    
    public static function _getRequestArguments($arguments = null){
        if($arguments){
            foreach($arguments as $k => $v){
                self::$$k = $v;
            }
        }
        $array['Weight'] = self::$Weight;
        $array['Format'] = self::$Format;
        return $array;
    }
}