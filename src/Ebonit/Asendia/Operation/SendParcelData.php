<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;

use \Ebonit\Asendia\Operation\Data\ParcelData;
use \Ebonit\Asendia\Operation\Data\DocumentSettings;

class SendParcelData
{
    private static $ParcelData;
    private static $DocumentSettings;
    
    
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            if($k == 'ParcelData'){
                $v = ParcelData::_getRequestArguments($v);
            }
            
            if($k == 'DocumentSettings'){
                $v = DocumentSettings::_getRequestArguments($v);
            }
            self::$$k = $v;
        }
        
        return self;
    }
}

