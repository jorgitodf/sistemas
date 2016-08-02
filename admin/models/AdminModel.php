<?php

class AdminModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function isLogged() {
        
        if (isset($_SESSION['adminLogin']) && !empty($_SESSION['adminLogin'])) {
            return true;           
        } else {
            return false;          
        }
       
    }    
   
} 