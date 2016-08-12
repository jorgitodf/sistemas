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

        if (isset($_POST['cliente']) && empty($_POST['cliente']['nome']))
            $dados['erroNome'] = "<span class='erro_cad_cliente'>Campo Nome Obrigatório</span>";
        else
            $dados['nome'] = $_POST['cliente'];
        if (empty($_POST['cliente']['rg']))
            $dados['erroRg'] = "<span class='erro_cad_cliente'>Campo RG Obrigatório</span>";
        else
            $dados['rg'] = $_POST['cliente'];
        if (empty($_POST['cliente']['orgao_expedidor']))
            $dados['erroOexpedidor'] = "<span class='erro_cad_cliente'>Campo Órgão Expedidor</span>";
        else
            $dados['orgao_expedidor'] = $_POST['cliente'];
        if (empty($_POST['cliente']['data_nascimento']))
           $dados['erroDtnascimento'] = "<span class='erro_cad_cliente'>Campo Data Nascimento Obrigatório</span>";
        else
            $dados['data_nascimento'] = $_POST['cliente'];
        if (empty($_POST['cliente']['senha_cad']))
            $dados['erroSenha'] = "<span class='erro_cad_cliente'>Campo Senha Obrigatório</span>";
        else
            $dados['senha_cad'] = $_POST['cliente'];
        if (empty($_POST['cliente']['logradouro']))
            $dados['erroLogradouro'] = "<span class='erro_cad_cliente'>Campo Tipo Logradouro Obrigatório</span>";
        else
            $dados['logradouro'] = $_POST['cliente'];
        if (empty($_POST['cliente']['log_descricao']))
            $dados['erroLogDescricao'] = "<span class='erro_cad_cliente'>Campo Logradouro Obrigatório</span>";
        else
            $dados['log_descricao'] = $_POST['cliente'];
        if (empty($_POST['cliente']['complemento']))
            $dados['erroComplemento'] = "<span class='erro_cad_cliente'>Campo Complemento Obrigatório</span>";
        else
            $dados['complemento'] = $_POST['cliente'];
        if (empty($_POST['cliente']['numero']))
            $dados['erroNumero'] = "<span class='erro_cad_cliente'>Campo Número Obrigatório</span>";
        else
            $dados['numero'] = $_POST['cliente'];






        $this->loadTemplate("clientecadastrarView", $dados);



    }

}