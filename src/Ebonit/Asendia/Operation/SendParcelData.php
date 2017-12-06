<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;

use Ebonit\Asendia\Operation\Data\ParcelData;
use Ebonit\Asendia\Operation\Data\DocumentSettings;

class SendParcelData
{
    private static $ParcelData;
    private static $DocumentSettings = NULL;
    
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            if($k == 'ParcelData'){
                $v = ParcelData::_getRequestArguments($arguments['ParcelData']);
                //exit();
            }
            
            if($k == 'DocumentSettings'){
                $v = DocumentSettings::_getRequestArguments($arguments['DocumentSettings']);
            }
            self::$$k = $v;
        }  

        if(NULL === self::$DocumentSettings){
            self::$DocumentSettings = DocumentSettings::_getRequestArguments();
        }
        $array['ParcelData'] = self::$ParcelData;
        $array['DocumentSettings'] = self::$DocumentSettings;
        return $array;
        
    }
}

