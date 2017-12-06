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
        $array = NULL;
        if($arguments){
            foreach($arguments as $k => $v){
                self::$$k = $v;
            }
        }
        
        if(NULL !== self::$Position){
        $array['Position'] = self::$Position;
        }
        
        if(NULL !== self::$HSTarifNumber){
        $array['HSTarifNumber'] = self::$HSTarifNumber;
        }
        
        if(NULL !== self::$OriginCountry){
        $array['OriginCountry'] = self::$OriginCountry;
        }
        
        if(NULL !== self::$Description){
        $array['Description'] = self::$Description;
        }
        
        if(NULL !== self::$Quantity){
        $array['Quantity'] = self::$Quantity;
        }
        
        if(NULL !== self::$Weight){
        $array['Weight'] = self::$Weight;
        }
        
        if(NULL !== self::$Value){
        $array['Value'] = self::$Value;
        }
        
        return $array;
    }
}