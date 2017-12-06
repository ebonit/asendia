<?php
/*
 *  Asendia shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 * 
 * this depends on stiwl/php-print-ipp
 * composer require stiwl/php-print-ipp
 * 
 */

namespace Ebonit\Asendia\Operation\Data;

class DispatchListData
{
    private static $numberOfPallets = NULL;
    private static $totalWeightGross = NULL;
    private static $remarks = NULL;
    private static $deliveryDataFrom = NULL;
    private static $deliveryDateTo = NULL;
    private static $pickupDateFrom = NULL;
    private static $pickupDateTo = NULL;
    
    public static function _getRequestArguments($arguments){
        
        foreach($arguments as $k => $v){        
            self::$$k = $v;
        }
        
        $array['numberOfPallets'] = self::$numberOfPallets;
        $array['totalWeightGross'] = self::$totalWeightGross;
        $array['$remarks'] = self::$remarks;
        $array['deliveryDataFrom'] = self::$deliveryDataFrom;
        $array['deliveryDateTo'] = self::$deliveryDateTo;
        $array['pickupDateFrom'] = self::$pickupDateFrom;
        $array['pickupDateTo'] = self::$pickupDateTo;
        
        return $array;
    }
}