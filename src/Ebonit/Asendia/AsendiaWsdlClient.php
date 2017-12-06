<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia;

use Ebonit\Asendia\Operation\SendParcelData;
use Ebonit\Asendia\Operation\GetParcelLabel;
use Ebonit\Asendia\Operation\CloseDispatchList;
use Ebonit\Asendia\Operation\GetPrePaidLabel;
use Ebonit\Asendia\Operation\DeleteParcel;
use Ebonit\Asendia\Operation\GetEvents;

class AsendiaWsdlClient extends AbstractWsdlClient 
{
    private $client;
    private $certificate;
    
    private $wsdl_test = 'https://webservices-int.post.ch:17002/IN_B2C_TESTxParcel/v1/';
    private $wsdl_live = 'https://webservices.post.ch:17002/IN_B2CxParcel/v1/';
    
    /**
     * dit moet anders..
     */
    public function __construct($certificate, $password, $test = false, $wsdl = null){
        if(null === $wsdl){
            if($test){
                $wsdl = $this->wsdl_test;   
                $location = $this->wsdl_test;
            }else{
                $wsdl = $this->wsdl_live; 
                $location = $this->wsdl_live; 
            }
        }
        if($test){
            $location = $this->wsdl_test;
        }else{
            $location = $this->wsdl_live; 
        }

        $options['trace'] = true;
        $options['exceptions'] = true;
        $options['local_cert'] = $certificate;
        $options['passphrase'] = $password;
        $options['soap_version'] = SOAP_1_1;//important: Asendia uses soap version 1
        $options['location'] = $location;
        
        try{
            $this->client = new \SoapClient($wsdl, $options);
        }
        catch (\Exception $e)
        {
            die( $e->getMessage() . '<br />' . $e->getTraceAsString());
        }
    }
    
    private function call($request, $arguments = null){
        if($arguments !== null){
            $arguments = (object)$arguments;
        }

        try{
            $result = $this->client->$request($arguments);
        } catch (\Exception $e)
        {
            echo var_export($this->client->__getLastRequest(),1);
            die( __FILE__.__LINE__. "<br/>\n" . $e->__toString() );
        }
        if($result->ResponseStatus !== 'OK'){
            $messages = '';
            if(is_array($result->LabelStatus->ErrorMessage)){
                foreach($result->LabelStatus->ErrorMessage as $message){
                    $messages .= $message->Message . "<br />\n";
                }
            }else{
                $messages = $result->LabelStatus->ErrorMessage->Message . "<br/>".PHP_EOL;
            }
            $returnValue['error'] = $messages;
        }
        else{
            $returnValue = $result;
        }
        return $returnValue;
        
    }
    
    public function connectionTest(){
        try{
            $result = $this->call('connectionTest', null);
            return $result;
        } catch (\Exception $ex) {
            die(__FILE__.__LINE__. "<br/>\n" . $ex->__toString());
        }
    }
    
    public function sendParcelData($arguments){
        return $this->call('sendParcelData', SendParcelData::_getRequestArguments($arguments));//['ParcelDataRequest' =>  (object)$parceldata]);
    }
    
    public function getParcelLabel($arguments){
        return $this->call('getParcelLabel', GetParcelLabel::_getRequestArguments($arguments));
    }
    
    public function closeDispatchList($arguments){
        return $this->call('closeDispatchList', CloseDispatchList::_getRequestArguments($arguments));
    }
    
    public function getPrePaidLabel($arguments){
        return $this->call('getPrePaidLabel', GetPrePaidLabel::_getRequestArguments($arguments));
    }
    
    public function deleteParcel($arguments){
        return $this->call('deleteParcel', DeleteParcel::_getRequestArguments($arguments));
    }
    
    public function getEvents($arguments){
        return $this->call('getEvents', GetEvents::_getRequestArguments($arguments));
    }
    
    public function __getFunctions(){
        return $this->client->__getFunctions();
    }
}

