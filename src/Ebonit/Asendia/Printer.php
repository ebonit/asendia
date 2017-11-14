<?php
/*
 *  Centiro shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 * 
 * this depends on stiwl/php-print-ipp
 * composer require stiwl/php-print-ipp
 * 
 */

namespace Ebonit\Centiro;

class Printer
{
    private $printer;
    private $host;
    private $port;
    private $queue;
    
    /**
     * 
     * @param String $printer
     */
    public function __construct($printer, $host, $port, $queue){
        $this->printer = $printer;
        $this->host = $host;
        $this->port = $port;
        $this->queue = $queue;
    }
    
    public function test($format = 'A6'){
        if(!file_exists(__DIR__."/Printertest/test{$format}.pdf")){
            throw new Exception('At this moment only A6 format is available'.PHP_EOL.'You can add PDF tests in  '.__DIR__."/Printertest/");
            return false;
        }
        
        if($this->printer->printDocument(__DIR__."/Printertest/test{$format}.pdf")){
            return true;
        }
        return false;
    }
    
    public function printDocument($document){
        
    }
}
