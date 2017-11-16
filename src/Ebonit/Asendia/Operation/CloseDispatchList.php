<?php
/*
 *  Centiro shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 * 
 * 
 */

namespace Ebonit\Asendia\Operation;

use Ebonit\Asendia\Operation\Data\DispatchListData;

class CloseDispatchList
{
    private static $DispatchListData = NULL;
    private static $Reference = NULL;
    
    public static function _getRequestArguments($arguments){

        foreach($arguments as $k => $v){  
            if($k == 'DispatchListData'){
                $v = DispatchListData::_getRequestArguments($v);
            }
            self::$$k = $v;
        }

        $array['DispatchListData'] = self::$DispatchListData;
        $array['Reference'] = self::$Reference;

        return $array;
    }
}
