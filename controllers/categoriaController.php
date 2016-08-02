<?php

class categoriaController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function ver($id = "") {
        if (is_numeric($id) && !empty($id) || empty($id)) {
            $dados = array('categorias' => '', 'produtos' => array());

            $produtos = new ProdutoModel();
            $dados['produtos'] = $produtos->listarCategoria($id);

            if(empty($dados['produtos'])) {
                $erro = new erro404Helper();
                $erro->erro404();
            }

            $categoria = new CategoriaModel();
            $dados['categoria'] = $categoria->getNomeCategoria($id);
            
            $this->loadTemplate("categoriaView", $dados);            
        } else {
            header("Location: /naoexiste");
            die();
        }
 
    }
   
}
