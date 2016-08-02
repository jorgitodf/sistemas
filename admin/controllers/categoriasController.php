<?php

class categoriasController extends Controller {
    
    protected $categoriasModel;

    public function __construct() {
        parent::__construct();
        $this->categoriasModel = new CategoriasModel();
        LoginAdminHelper::isLoogedAdmin();
    }
    
    public function index() {

        $dados = array();
        $dados['categorias'] = $this->categoriasModel->getCategorias();
        
        $this->loadTemplate('categoriasView', $dados); 
    }
    
    public function adicionar() {
        
        $dados = array('erro' => '');
        
        if (isset($_POST['nome_categoria']) && !empty($_POST['nome_categoria'])) {

            $retorno = $this->categoriasModel->criaCategoria(trim($_POST['nome_categoria']));
            if ($retorno == true) {
                header("Location: /admin/categorias");
            } else {
               $this->loadTemplate('categorias_addView', $dados);  
            }
        } elseif (isset($_POST['nome_categoria']) && empty($_POST['nome_categoria'])) {
            $dados['erro'] = "<span class='alert alert-danger erro_categoria' role='alert'>Preencha o Nome da Categoria</span>";
        }   
        
        $this->loadTemplate('categorias_addView', $dados); 
    }  
    
    public function editar($id) {
        $dados = array();
        
        if (isset($_POST['nome_categoria']) && !empty($_POST['nome_categoria'])) {
            $this->categoriasModel->editCategorias(trim($id), trim($_POST['nome_categoria'])); 
            header("Location: /admin/categorias");
        }
        if (is_numeric($id) && isset($id) && !empty($id)) {
            $dados['categoria'] = $this->categoriasModel->getCategoria(trim($id));
            if (empty($dados['categoria']) || $dados['categoria'] == 0) {
                header("Location: /admin/categorias");
            }
            $this->loadTemplate('categorias_editView', $dados); 
        } else {
            header("Location: /admin/categorias");
        }
    }    
    
    public function remover($id) {
        if (is_numeric($id) && isset($id) && !empty($id)) {
            $this->categoriasModel->removerCategoria($id);
            header("Location: /admin/categorias");
        } else {
            header("Location: /admin/categorias");
        }     
    }
        
   
}