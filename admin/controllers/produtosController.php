<?php

class produtosController extends Controller {

    public $produtosModel;
    protected $categoriasModel;

    function __construct() {
        parent::__construct();
        $this->produtosModel = new ProdutosModel();
        $this->categoriasModel = new CategoriasModel();
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
        $dados = array('categorias'=>array());
        $dados['categorias'] = $this->categoriasModel->getCategorias();

        if(isset($_POST['nome_produto']) && !empty($_POST['nome_produto']) && isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {
            $nome = addslashes($_POST['nome_produto']);
            $descricao = addslashes($_POST['descricao']);
            $categoria = addslashes($_POST['categoria']);
            $preco = addslashes($_POST['preco']);
            $quantidade = addslashes($_POST['quantidade']);
            $imagem = $_FILES['imagem'];

            if(in_array($imagem['type'], array('image/jpeg', 'image/jpg'))) {
                $md5imagem = md5(time().rand(0,9999)).'.jpg';
                move_uploaded_file($imagem['tmp_name'], '../assets/images/produtos/'.$md5imagem);
                $this->produtosModel->inserirProduto($nome, $descricao, $categoria, $preco, $quantidade, $md5imagem);

                header("Location: /admin/produtos");
            }
        }

        $this->loadTemplate('produtos_addView', $dados);
    }     
    
    public function editar($id) {
        $dados = array('categorias' => array(), 'produto' => array());
        $dados['categorias'] = $this->categoriasModel->getCategorias();
        $dados['produto'] = $this->produtosModel->getProduto($id);

        if(isset($_POST['nome_produto']) && !empty($_POST['nome_produto'])) {
            $nome = addslashes($_POST['nome_produto']);
            $descricao = addslashes($_POST['descricao']);
            $categoria = addslashes($_POST['categoria']);
            $preco = addslashes($_POST['preco']);
            $quantidade = addslashes($_POST['quantidade']);

            $this->produtosModel->updateProduto($nome, $preco, $quantidade, $descricao, $categoria, $id);

            if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {
                $imagem = $_FILES['imagem'];

                if(in_array($imagem['type'], array('image/jpeg', 'image/jpg'))) {
                    $md5imagem = md5(time().rand(0,9999)).'.jpg';
                    move_uploaded_file($imagem['tmp_name'], '../assets/images/produtos/'.$md5imagem);
                    $this->produtosModel->updateImagem($id, $md5imagem);
                }
            }

            header("Location: /admin/produtos");
        }
        $this->loadTemplate('produtos_editView', $dados);
    } 
    
    public function remover($id) {
        $dados = array();

    }     

}
