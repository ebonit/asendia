<?php
/*
 *  Asendia Benelux shipment API Client
 * 
 *  (c) Eric Bontenbal web development <info@ericbontenbal.nl>
 */

namespace Ebonit\Asendia;

interface AsendiaWsdlClientInterface
{
    public function connectionTest();
    
    public function sendParcelData($arguments);
    
    public function getParcelLabel($arguments);
    
    public function closeDispatchList($arguments);
    
    public function getPrePaidLabel($arguments);
    
    public function deleteParcel($arguments);
    
    public function getEvents($arguments);
    
}
