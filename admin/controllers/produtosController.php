<?php

class produtosController extends Controller {

    public $produtosModel;

    function __construct() {
        parent::__construct();
        $this->produtosModel = new ProdutosModel();
        LoginAdminHelper::isLoogedAdmin();
    }

    public function index() {
        $dados = array();
        $offset = 0;
        $limit = 3;
        
        if (isset($_GET['p']) && !empty($_GET['p']) && is_numeric($_GET['p'])) {
            $p = addslashes($_GET['p']);
            $offset = ($limit * $p) - $limit;
        } elseif (isset($_GET['p']) && !empty($_GET['p']) && !is_numeric($_GET['p'])) {
            header("Location: /admin/produtos");
        }
        
        $dados['limite_produtos'] = $limit;
        $dados['total_produtos'] = $this->produtosModel->getTotalProdutos();
        $dados['produtos'] = $this->produtosModel->getProdutos($offset, $limit);

        $this->loadTemplate('produtosView', $dados);
    }
    
    public function adicionar() {
        $dados = array();

    }     
    
    public function editar($id) {
        $dados = array();

    } 
    
    public function remover($id) {
        $dados = array();

    }     

}
