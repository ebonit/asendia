<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

class DocumentSettings
{
    private static $PrinterSettings;
    private static $StartPosition = NULL;
    private static $DocumentType;
    
    public static function _getRequestArguments($arguments){
        
        foreach($arguments as $k => $v){        
            self::$$k = $v;
        }
        $array['PrinterSettings'] = self::$PrinterSettings;
        $array['StartPosition'] = self::$StartPosition;
        $array['DocumentType'] = self::$DocumentType;
        return $array;
    }
}