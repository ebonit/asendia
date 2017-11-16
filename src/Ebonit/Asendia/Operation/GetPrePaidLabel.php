<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;

use \Ebonit\Asendia\Operation\Data\PrePaidData;
use \Ebonit\Asendia\Operation\Data\DocumentSettings;

class GetPrePaidLabel
{
    private static $PrePaidData;
    private static $DocumentSettings;
    
    public static function _getRequestArguments($arguments){
        
        foreach($arguments as $k => $v){ 
            if($k == 'PrePaidData'){
                $v = PrePaidData::_getRequestArguments($v);
            }
            if($k == 'DocumentSettings'){
                $v = DocumentSettings::_getRequestArguments($v);
            }
            self::$$k = $v;
        }
        
        $array['PrePaidData'] = self::$PrePaidData;
        $array['DocumentSettings'] = self::$DocumentSettings;
        
        return $array;
    }
}