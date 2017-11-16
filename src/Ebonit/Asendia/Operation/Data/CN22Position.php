<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

class CN22Position
{
    
    public static $Position = NULL;
    public static $HSTarifNumber = NULL;
    public static $OriginCountry = NULL;
    public static $Description = NULL;
    public static $Quantity = NULL;
    public static $Weight = NULL;
    public static $Value = NULL;
    
    public static function _getRequestArguments($arguments = null){
        if($arguments){
            foreach($arguments as $k => $v){
                self::$$k = $v;
            }
        }
        $array['Position'] = self::$Position;
        $array['HSTarifNumber'] = self::$HSTarifNumber;
        $array['OriginCountry'] = self::$OriginCountry;
        $array['Description'] = self::$Description;
        $array['Quantity'] = self::$Quantity;
        $array['Weight'] = self::$Weight;
        $array['Value'] = self::$Value;
        return $array;
    }
}