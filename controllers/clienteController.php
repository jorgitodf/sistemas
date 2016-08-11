<?php

class clienteController extends Controller {

    protected $ufsModel;
    protected $tipoLogradourosModel;
    protected $orgaosExpedidoresModel;
    protected $usuarioModel;

    function __construct() {
        parent::__construct();
        $this->ufsModel = new UfModel();
        $this->tipoLogradourosModel = new TipoLogradourosModel();
        $this->orgaosExpedidoresModel = new OrgaosExpedidoresModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function index() {

        $dados = array();
        $dados['ufs'] = $this->ufsModel->getAllUfs();
        $dados['tipoLogradouros'] = $this->tipoLogradourosModel->getAllTipoLogradouros();
        $dados['orgaosExpedidores'] = $this->orgaosExpedidoresModel->getAllOrgaoExpedidores();

        if (isset($_POST['cpf-sem-cadastro']) && empty($_POST['cpf-sem-cadastro'])) {
            $dados['erroCpf'] = "<span class='erro-cpf'>Campo CPF Obrigatório</span>";
            $dados['email'] = addslashes($_POST['email-sem-cadastro']);
        }
        if (isset($_POST['email-sem-cadastro']) && empty($_POST['email-sem-cadastro'])) {
            $dados['erroEmail'] = "<span class='erro-email'>Campo E-mail Obrigatório</span>";
            $dados['cpf'] = addslashes($_POST['cpf-sem-cadastro']);
        }


        if (isset($_POST['cpf-sem-cadastro']) && !empty($_POST['cpf-sem-cadastro']) && isset($_POST['email-sem-cadastro']) && !empty($_POST['email-sem-cadastro'])) {
            $cpf = addslashes($_POST['cpf-sem-cadastro']);
            $email = addslashes($_POST['email-sem-cadastro']);

            if ($this->usuarioModel->verificaCpf($cpf) == true) {
                $dados['cpfAviso'] = "<span class='alert alert-danger cpf-aviso' role='alert'>CPF já cadastrado no sistema</span>";
            } else {
                $_SESSION['novo_cliente'] = array('cpf'=>'','email'=>'');
                $_SESSION['novo_cliente']['cpf'] = $cpf;
                $_SESSION['novo_cliente']['email'] = $email;
                header("Location: /cliente/cadastrar");
            }

        }
        $this->loadTemplate("identificacaoView", $dados);
    }

    public function cadastrar() {
        $dados = array();
        $dados['ufs'] = $this->ufsModel->getAllUfs();
        $dados['tipoLogradouros'] = $this->tipoLogradourosModel->getAllTipoLogradouros();
        $dados['orgaosExpedidores'] = $this->orgaosExpedidoresModel->getAllOrgaoExpedidores();

        $this->loadTemplate("clientecadastrarView", $dados);
    }

}