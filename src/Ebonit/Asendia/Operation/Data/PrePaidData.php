<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;


class PrePaidData
{
    private static $Reference;
    private static $AdditionalServiceRetour = NULL;
    
    public static function _getRequestArguments($arguments){
        foreach($arguments as $k => $v){
            self::$$k = $v;
        }
        $array['Reference'] = self::$Reference;
        $array['AdditionalServiceRetour'] = self::$AdditionalServiceRetour;
        
        return $array;
    }
}