<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

use \Ebonit\Asendia\Operation\Data\Recipient;
use \Ebonit\Asendia\Operation\Data\ItemInformation;

class ParcelData
{
    private static $Reference;
    private static $Recipient;
    private static $ItemInformation;
    private static $BasicService = 'FT';
    private static $AdditionalService = ['72', '42'];
    private static $AdditionalServiceReturn = NULL;
    private static $Content = NULL;
    private static $Currency = 'EUR';
    private static $CN22Position = NULL; 
    
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            if($k == 'Recipient'){
                $v = Recipient::_getRequestArguments($v);
            }
            
            if($k == 'ItemInformation'){
                $v = ItemInformation::_getRequestArguments($v);
            }
            
            if($k == 'Currency'){
                if(!self::_allowedCurrency($currency)){
                    throw \Exception("The Currency is not allowed!");
                }
            }
            if($k =='CN22Position'){
                $v = CN22Position::_getRequestArguments($v);
            }
            
            if($k == 'AdditionalService'){
                self::$AdditionalService[] = $v;
            }else{
                self::$$k = $v;
            }
        }
        
        $array['Reference'] = self::$Reference;
        $array['Recipient'] = self::$Recipient;
        $array['ItemInformation'] = self::$ItemInformation;
        $array['BasicService'] = self::$BasicService;
        $array['AdditionalService'] = self::$AdditionalService;
        if(NULL !== self::$AdditionalServiceReturn){
            $array['AdditionalServiceReturn'] = self::$AdditionalServiceReturn;
        }
        if(NULL !== self::$Content){
            $array['Content'] = self::$Content;
        }
        $array['Currency'] = self::$Currency;
        if(NULL !== self::$CN22Position){
            $array['CN22Position'] = self::$CN22Position;
        }
        return $array;
    }
    
    private static function _allowedCurrency($currency){
        $allowed = ['EUR', 'CHF', 'USD', 'GBP', 'SEK', 'SGD', 'HKD', 'DKK', 'NOK'];
        return in_array($currency, $allowed);
    }
}
