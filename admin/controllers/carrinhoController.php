<?php

class carrinhoController extends Controller {
    
    protected $produtoModel;
    protected $pagamentoModel;
    protected $usuarioModel;
    protected $vendasModel;
     
    public function __construct() {
        parent::__construct();
        $this->produtoModel = new ProdutoModel();
        $this->pagamentoModel = new PagamentoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->vendasModel = new VendasModel();
    }
    
    public function index() {
        $dados = array();
        $produtos = array();
        if (isset($_SESSION['carrinho'])) {
            $produtos = $_SESSION['carrinho'];
        }  
        if (count($produtos)) {
            $dados['produtos'] = $this->produtoModel->verProdutoCarrinho($produtos);  
            $this->loadTemplate("carrinhoView", $dados);
        } else {
            header("Location: /");
        }
    }

    public function add($id = "") {
        if (!empty($id)) {
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = array();
            }
            $_SESSION['carrinho'][] = $id;
            header("Location: /carrinho");
        }
    }
    
    public function del($id) {
        if (!empty($id)) {
            foreach($_SESSION['carrinho'] as $chave => $valor) {
                if ($id == $valor) {
                    unset($_SESSION['carrinho'][$chave]);
                }
            }
            header("Location: /carrinho");
        }
    }    
    
    public function finalizar() {
        
        $dados = array(
            'pagamentos' => array(), 
            'total' => 0, 
            'erro' => ''
        );
        
        $dados['pagamentos'] = $this->pagamentoModel->getPagamentos();

        $produtos = array();
        if (isset($_SESSION['carrinho'])) {
            $produtos = $_SESSION['carrinho'];
        }  
        if (count($produtos)) {
            $dados['produtos'] = $this->produtoModel->verProdutoCarrinho($produtos);  
            foreach ($dados['produtos'] as $value) {
                $dados['total'] += $value['preco'];
            }
        }  
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $endereco = addslashes($_POST['endereco']);
            
            if (isset($_POST['pgm'])) {
               $tipo_pgm = $_POST['pgm']; 
            } else {
                $tipo_pgm = '';
            }
            
            if (!empty($email) && !empty($email) && !empty($endereco) && !empty($tipo_pgm)) {
                $userId = 0;
                $user = $this->usuarioModel;
                if ($user->isExiste($email)) {
                    if ($user->isExiste($email, $senha)) {
                        $userId = $user->getId($email);
                    } else {
                        $dados['erro'] = "Usuário e/ou Senha Errado(s)";
                    }
                } else {
                    $userId = $user->criar($nome, $email, $senha);
                }
                if (!empty($userId > 0)) {
                    $subTotal = 0;
                    $produtos = array();
                    if (isset($_SESSION['carrinho'])) {
                        $produtos = $_SESSION['carrinho'];
                    }  
                    if (count($produtos)) {
                        $produtos = $this->produtoModel->verProdutoCarrinho($produtos);  
                        foreach ($produtos as $value) {
                            $subTotal += $value['preco'];
                        }
                    }  

                    $vendas = $this->vendasModel;
                    $link = $vendas->setVenda($endereco, $subTotal, $tipo_pgm, $userId, $produtos);
                    header("Location: ".$link);
                }
            } else {
                $dados['erro'] = "Preencha todos os campos";
            }
        }
        $this->loadTemplate("finalizar_compraView", $dados);
        
    } 
    
    public function obrigado() {
        $dados = array();
        $this->loadTemplate("obrigadoView", $dados);            
    }
    
    public function notificacao() {
        $vendas = $this->vendasModel;
        $vendas->verificarVendas();
        $this->loadTemplate("obrigadoView", $dados);            
    }    
}