<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

class Recipient
{
    
    public static $Name;
    public static $Contact = NULL;
    public static $Street;
    public static $No = NULL;
    public static $City;
    public static $ZipCode;
    public static $Region = NULL;
    public static $CountryCode;
    public static $Mobile = NULL;
    public static $Email = NULL;
    
    public static function _getRequestArguments($arguments){
        
        foreach($arguments as $k => $v){                    
            self::$$k = $v;
        }
        $array['Name'] = self::$Name;
        $array['Contact'] = self::$Contact;
        $array['Street'] = self::$Street;
        $array['No'] = self::$No;
        $array['City'] = self::$City;
        $array['ZipCode'] = self::$ZipCode;
        $array['Region'] = self::$Region;
        $array['CountryCode'] = self::$CountryCode;
        $array['Mobile'] = self::$Mobile;
        $array['Email'] = self::$Email;
        return $array;
    }
}
