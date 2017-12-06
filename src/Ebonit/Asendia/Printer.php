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

namespace Ebonit\Asendia;

use Stiwl\PhpPrintIpp\Lib\CupsPrintIPP;
use Stiwl\PhpPrintIpp\Lib\PrintIPP;

class Printer
{
    private $host;
    private $port;
    private $queue;
    private $printer;
    
    private $logactive = false;
    private $logdestination;
    private $logtype; //fi 'file'
    private $loglevel; //1-3
    
    /**
     * 
     * @param String $printer
     */
    public function __construct($host, $port, $queue, $printer = 'cups'){
        $this->printer = $printer;
        $this->host = $host;
        $this->port = $port;
        $this->queue = $queue;
    }
    
    public function setLog($active, $destination, $destinationType, $level){
        $this->logactive = $active;
        $this->logdestination = $destination;
        $this->logtype = $destinationType;
        $this->loglevel = $level;
    }
    
    public function test($format = 'A6'){
        if(!file_exists(__DIR__."/Printertest/test{$format}.pdf")){
            throw new Exception('At this moment only A6 format is available'.PHP_EOL.'You can add PDF tests in  '.__DIR__."/Printertest/");
            return false;
        }
        
        if($this->printDocument(__DIR__."/Printertest/test{$format}.pdf")){
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @param string $pdf, /path/to/the/pdf
     * @return Boolean
     * 
     */
    public function printDocument($pdf){
        if($this->printer == 'cups'){
            $printer = new CupsPrintIPP();
        }else{
            $printer = new PrintIPP();
        }
        if($this->logactive){
            $printer->setLog($this->logdestination, $this->logtype, $this->loglevel);
        }
        $printer->setHost($this->host);
        $printer->setPrinterURI("ipp://{$this->host}:{$this->port}/{$this->queue}");

        $printer->unsetFormFeed();
        $printer->setData($pdf);

        $result = $printer->printJob();
        return $result;
    }
}
