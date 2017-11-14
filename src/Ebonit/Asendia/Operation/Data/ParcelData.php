<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia\Operation\Data;

use \Ebonit\Asendia\Operation\Data\Recipient;
use \Ebonit\Asendia\Operation\Data\ItemInformation;

class ParcelData
{
    private static $Reference;
    private static $Recipient;
    private static $ItemInformation;
    private static $BasicService = 'FT';
    private static $AdditionalService = '72 42';
    private static $AdditionalServiceReturn = NULL;
    private static $Content = NULL;
    private static $Currency = 'EUR';
    private static $CN22Position = NULL; //nazien
    
    
    public static function _getRequestArguments($arguments){
        if($k == 'Recipient'){
            $v = Recipient::_getRequestArguments($v);
        }
        foreach($arguments as $k => $v){
            self::$$k = $v;
        }
        return self;
    }
}