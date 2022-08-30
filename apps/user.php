<?php

class User{
    
    public $id;
    
    public function __construct(){
        
        global $user_ID;
        
        $this->id = $user_ID;
    }
    
    
    
}