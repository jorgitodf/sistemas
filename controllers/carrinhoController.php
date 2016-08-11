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
        $ids = array();
        $produtos = array();
        //unset($_SESSION['carrinho']);
        if (count($_SESSION['carrinho']) > 0) {
            $produtos = $_SESSION['carrinho'];
            $ids = array_keys($produtos);
        }
        if (!empty($produtos)) {
            $dados['produtos'] = $this->produtoModel->verProdutoCarrinho($ids);
            $this->loadTemplate("carrinhoView", $dados);
        } else {
            header("Location: /");
        }
    }

    public function add($id = "") {
        if (!empty($id)) {

            if (!isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
            header("Location: /carrinho");
        }

    }

    public function atualizarQuantidadeCarrinho() {
        if (isset($_POST) && is_array($_POST['quantidade'])) {
            foreach($_POST['quantidade'] as $chave => $valor) {
                foreach($_SESSION['carrinho'] as $chaveC => $valorC) {
                    if ($chave == $chaveC) {
                        $_SESSION['carrinho'][$chaveC] = $valor;
                        print_r($_SESSION['carrinho']);
                        exit;
                    }
                }
            }
        }
        header("Location: /carrinho");
    }

    public function del($id) {
        if (!empty($id)) {
            foreach($_SESSION['carrinho'] as $chave => $valor) {
                if ($id == $chave) {
                    unset($_SESSION['carrinho'][$chave]);
                }
            }
            header("Location: /carrinho");
        }
    }

    public function finalizar() {
        $dados = array();

        $this->loadTemplate("identificacaoView", $dados);
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