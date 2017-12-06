<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia;

class Client
{
    
    private $client;
    
    
    public function __construct($certificate, $password, $test = false, $wsdl = null){
        
        $this->client = new AsendiaWsdlClient($certificate, $password, $test, $wsdl);
    }
    
    /**
     * 
     * @param string $name
     * @param array $arguments
     * @return xml soap response
     * @throws exception
     */
    public function __call($name, $arguments){
        if(!method_exists($this->client, $name)){
            throw \Exception('The called method does not exist!');
        }
        return $this->client->$name($arguments);
    }
}