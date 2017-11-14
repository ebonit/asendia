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
    private $user;
    private $password;
    
    public function __construct($user, $password){
        $this->user = $user;
        $this->password = $password;
        
        $this->client = new AsendiaWsdlClient($user, $password);
    }
    
    public function __call($name, $arguments){
        if(!method_exists($this->client, $name)){
            throw \Exception('The called method does not excist!');
        }
        return $this->client->$name($arguments);
    }
}