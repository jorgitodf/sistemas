<?php

class produtoController extends Controller {
    
    public $produtoModel;
    
    public function __construct() {
        $this->produtoModel = new ProdutoModel();
        parent::__construct();
    }

    public function ver($id = "") {
        if (!empty($id)) {
            $dados = array();
            $id = addslashes($id);
            $dados['produtos'] = $this->produtoModel->verProduto($id);
            if(is_array($dados['produtos']) && !empty($dados['produtos'])) {
               $this->loadTemplate("produtoView", $dados);      
            } else {
               echo header("Location: /naoencontrado"); 
            }
                   
        } else {
            echo header("Location: /naoencontrado");
        }
 
    }
    
}
