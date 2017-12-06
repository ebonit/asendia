<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

class DocumentSettings
{
    private static $PrinterSettings = 'A6';
    private static $StartPosition = NULL;
    private static $DocumentType = 'PDF';
    
    public static function _getRequestArguments($arguments = NULL){
        if($arguments){
            foreach($arguments as $k => $v){        
                self::$$k = $v;
            }
        }
        $array['PrinterSettings'] = self::$PrinterSettings;
        if(NULL !== self::$StartPosition){
            $array['StartPosition'] = self::$StartPosition;
        }
        $array['DocumentType'] = self::$DocumentType;
        return $array;
    }
}