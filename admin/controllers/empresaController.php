<?php

class empresaController extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $dados = array();
        
        $dados['empresa'] = "Página em Construção";

        $this->loadTemplate('empresaView', $dados);
        
    }
}
