<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation;


class GetParcelLabel
{
    
    private static $Reason = 'IEN'; 
    private static $Remarks = NULL;
    private static $Reference;
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            self::$$k = $v;
        }
        $array['Reason'] = self::$Reason;
        $array['Remarks'] = self::$Remarks;
        $array['Reference'] = self::$Reference;
        return $array;
    }
}