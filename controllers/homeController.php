<?php

class homeController extends Controller {
    
    public function __construct() {
        parent::__construct(); //executa do contrutor da classe extendida
    }


    public function index() {

        $dados = array();
        
        $produtos = new ProdutoModel();
        $dados['produtos'] = $produtos->listarProdutos(10);

        $this->loadTemplate('homeView', $dados);
        
    }
}