<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;

use Ebonit\Asendia\Operation\Data\DocumentSettings;

class GetParcelLabel
{
    
    private static $Reference;
    private static $DocumentSettings;
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            
            if($k == 'DocumentSettings'){
                $v = DocumentSettings::_getRequestArguments($v);
            }
            self::$$k = $v;
        }
        $array['Reference'] = self::$Reference;
        $array['DocumentSettings'] = self::$DocumentSettings;
        return $array;
    }
}