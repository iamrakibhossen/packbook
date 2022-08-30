<?php

use DPD\Services\DPDService;

class APP{
    
    public $db;
    
    public $user;

    public function __construct(){
        
        global $wpdb, $user_ID;
        
        $this->db = $wpdb;
        
        $this->user = $user_ID;
    }
    
    public function class($name){
        
        require_once($user);
        
        $class = new ucfirst($name);
        
        return $class;
    }
    
    public function user($user_id){
        
        $user = get_userdata($user_id);
        
        return $user;
        
    }
    
    public function checkPostCode($code, $countryCode = 'PL'){
        
        $dpd = new DPDService();
        
        $result = $dpd->checkPostCode($code, $countryCode);
        
        if( !empty($result->status) && $result->status == 'OK'){
            return true;
        }
        
        return false;
        
    }
    
    public function checkCourierAvailability( $postCode, $countryCode = 'PL', $courier = 'DPD')
    {
        
        if( $courier == 'DPD'){
            
            
            $dpd = new DPDService();
            
             $result =  $dpd->checkCourierAvailability($postCode, $countryCode);
            
            return $result;
            
            if( !empty($result->status) && $result->status == 'OK'){
            return true;
            }
            
            return false;
        }
        
    }
    
    public function parcelOrder($sender, $receiver, $parcels, $courier = 'DPD'){
        
        
        if( $courier == 'DPD'){
            
    
            $sender = [
                'fid' => '1495',
                'name' => $sender['fullname'],
                'company' => $sender['company'],
                'address' => $sender['street'],
                'city' =>  $sender['city'],
                'postalCode' => $sender['postcode'],
                'countryCode' => $sender['country'],
                'email'=> $sender['email'],
                'phone' => $sender['phone']
            ];

            $receiver = [
                'name' => $receiver['fullname'],
                'company' => $receiver['company'],
                'address' => $receiver['street'],
                'city' =>  $receiver['city'],
                'postalCode' => $receiver['postcode'],
                'countryCode' => $receiver['country'],
                'email'=> $receiver['email'],
                'phone' => $receiver['phone']
            ];
            
            $dpd = new DPDService();
            
            $dpd->setSender($sender);
            
            $result = $dpd->sendPackage($parcels, $receiver, 'SENDER');
            
            if( !empty($result->success) && $result->success=== true){
                
                list($parcel) = $result->parcels;
            
                $pickupAddress = [
                    'fid' => '1495',
                ];
                
                $speedlabel = $dpd->generateSpeedLabelsByPackageIds([$result->packageId], $pickupAddress);

                file_put_contents('pdf/slbl-pid' . $result->packageId . '.pdf', $speedlabel->filedata);
                
                $trackId = $parcel->Waybill;
                
                return $trackId;
            
            }
            
            return $false;
        }
        
        
    }
    
}

$app = new APP();