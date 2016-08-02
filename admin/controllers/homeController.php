<?php

class homeController extends Controller {
    
    protected $adminModel;
    
    public function __construct() {
        parent::__construct();
        LoginAdminHelper::isLoogedAdmin();
    } 

    public function index() {

        $dados = array();
        
        $this->loadTemplate('homeView');            
        
    }
}