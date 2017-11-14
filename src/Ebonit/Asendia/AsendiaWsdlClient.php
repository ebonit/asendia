<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia;

use \Ebonit\Asendia\Operation\SendParcelData;

class AsendiaWsdlClient extends AbstractWsdlClient 
{
    private $client;
    private $wsdl_test = 'https://webservices-int.post.ch:17002/IN_B2C_TESTxParcel/v1/';
    private $wsdl_live = 'https://webservices.post.ch:17002/IN_B2CxParcel/v1/';
    
    /**
     * dit moet anders..
     */
    public function __construct($test = true){
        if($test){
            $wsdl = $this->wsdl_test;            
        }else{
            $wsdl = $this->wsdl_live; 
        }
        $this->client = new \SoapClient($wsdl);
    }
    
//    private function inputHeaders(){
//        return new \SoapHeader('https://uat.centiro.com/', 'AuthenticationTicket', $this->authenticate);
//    }
    
    private function call($request, $arguments){
        return $this->client->__soapCall($request, $arguments);
    }
    
    public function connectionTest(){
        return $this->client->ConnectionTestRequest();
    }
    
    public function sendParcelData($arguments){
        return $this->call('ParcelDataRequest', SendParcelData::_getRequestArguments($arguments));
    }
    
    public function getParcelLabel($arguments){

    }
    
    public function closeDispatchList($arguments){

    }
    
    public function getPrePaidLabel($arguments){

    }
    
    public function deleteParcel($arguments){

    }
    
    public function getevents($arguments){

    }
}

