<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia;

use Ebonit\Asendia\Operation\SendParcelData;
use Ebonit\Asendia\Operation\GetParcelLabel;

class AsendiaWsdlClient extends AbstractWsdlClient 
{
    private $client;
    private $certificate;
    
    private $wsdl_test = 'https://webservices-int.post.ch:17002/IN_B2C_TESTxParcel/v1/';
    private $wsdl_live = 'https://webservices.post.ch:17002/IN_B2CxParcel/v1/';
    
    /**
     * dit moet anders..
     */
    public function __construct($certificate, $password, $test = false){
        if($test){
            $wsdl = $this->wsdl_test;            
        }else{
            $wsdl = $this->wsdl_live; 
        }
        $this->client = new \SoapClient($wsdl, ['local_cert' => $certificate, 'password' => $password]);
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
        return $this->call('ParcelLabelRequest', GetParcelLabel::_getRequestArguments($arguments));
    }
    
    public function closeDispatchList($arguments){
        return $this->call('DispatchListRequest', CloseDispatchList::_getRequestArguments($arguments));
    }
    
    public function getPrePaidLabel($arguments){
        return $this->call('PrePaidLabelRequest', GetPrePaidLabel::_getRequestArguments($arguments));
    }
    
    public function deleteParcel($arguments){
        return $this->call('DeleteParcelRequest', DeleteParcel::_getRequestArguments($arguments));
    }
    
    public function getEvents($arguments){
        return $this->call('EventRequest', GetEvents::_getRequestArguments($arguments));
    }
}

