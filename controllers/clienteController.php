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
                $_SESSION['novo_cliente']['cpf'] = addslashes($cpf);
                $_SESSION['novo_cliente']['email'] = addslashes($email);
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

    public function salvar() {
        $dados = array();
        $dados['ufs'] = $this->ufsModel->getAllUfs();
        $dados['tipoLogradouros'] = $this->tipoLogradourosModel->getAllTipoLogradouros();
        $dados['orgaosExpedidores'] = $this->orgaosExpedidoresModel->getAllOrgaoExpedidores();

        if (isset($_POST['cliente']) && empty($_POST['cliente']['nome'])) {
            $dados['erroNome'] = "<span class='erro_cad_cliente'>Campo Nome Obrigatório</span>";
            $status = false;
        } else
            $dados['nome'] = $_POST['cliente'];
        if (isset($_POST['cliente']) && empty($_POST['cliente']['rg'])) {
            $dados['erroRg'] = "<span class='erro_cad_cliente'>Campo RG Obrigatório</span>";
            $status = false;
        } else
            $dados['rg'] = $_POST['cliente'];
            $status = false;
        if (isset($_POST['cliente']) && empty($_POST['cliente']['orgao_expedidor'])) {
            $dados['erroOexpedidor'] = "<span class='erro_cad_cliente'>Campo Órgão Expedidor</span>";
            $status = false;
        } else
            $dados['orgao_expedidor'] = $_POST['cliente'];
        if (isset($_POST['cliente']) && empty($_POST['cliente']['data_nascimento'])) {
            $dados['erroDtnascimento'] = "<span class='erro_cad_cliente'>Campo Data Nascimento Obrigatório</span>";
            $status = false;
        } else
            $dados['data_nascimento'] = $_POST['cliente'];
        if (isset($_POST['cliente']) && empty($_POST['cliente']['senha_cad'])) {
            $dados['erroSenha'] = "<span class='erro_cad_cliente'>Campo Senha Obrigatório</span>";
            $status = false;
        } else
            $dados['senha_cad'] = $_POST['cliente'];
        if (isset($_POST['cliente']) && (empty($_POST['cliente']['ddd']) || empty($_POST['cliente']['telefone']))) {
            $dados['erroTelefone'] = "<span class='erro_cad_cliente'>Campos DDD e Telefone Obrigatórios</span>";
            $status = false;
        } else
            $dados['telefone'] = $_POST['cliente'];
        if (isset($_POST['cliente']) && (empty($_POST['cliente']['ddd-cel']) || empty($_POST['cliente']['celular']))) {
            $dados['erroCelular'] = "<span class='erro_cad_cliente'>Campos DDD e Celular Obrigatórios</span>";
            $status = false;
        } else
            $dados['celular'] = $_POST['cliente'];
        if (empty($_POST['cliente']['logradouro'])) {
            $dados['erroLogradouro'] = "<span class='erro_cad_cliente'>Campo Tipo Logradouro Obrigatório</span>";
            $status = false;
        } else
            $dados['logradouro'] = $_POST['cliente'];
        if (empty($_POST['cliente']['log_descricao'])) {
            $dados['erroLogDescricao'] = "<span class='erro_cad_cliente'>Campo Logradouro Obrigatório</span>";
            $status = false;
        } else
            $dados['log_descricao'] = $_POST['cliente'];
        if (empty($_POST['cliente']['complemento'])) {
            $dados['erroComplemento'] = "<span class='erro_cad_cliente'>Campo Complemento Obrigatório</span>";
            $status = false;
        } else
            $dados['complemento'] = $_POST['cliente'];
        if (empty($_POST['cliente']['numero'])) {
            $dados['erroNumero'] = "<span class='erro_cad_cliente'>Campo Número Obrigatório</span>";
            $status = false;
        } else
            $dados['numero'] = $_POST['cliente'];
        if (empty($_POST['cliente']['cep'])) {
            $dados['erroCep'] = "<span class='erro_cad_cliente'>Campo Cep Obrigatório</span>";
            $status = false;
        } else
            $dados['cep'] = $_POST['cliente'];
        if (empty($_POST['cliente']['bairro'])) {
            $dados['erroBairro'] = "<span class='erro_cad_cliente'>Campo Bairro Obrigatório</span>";
            $status = false;
        } else
            $dados['bairro'] = $_POST['cliente'];
        if (empty($_POST['cliente']['cidade'])) {
            $dados['erroCidade'] = "<span class='erro_cad_cliente'>Campo Cidade Obrigatório</span>";
            $status = false;
        } else
            $dados['cidade'] = $_POST['cliente'];
        if (empty($_POST['cliente']['uf'])) {
            $dados['erroUf'] = "<span class='erro_cad_cliente'>Campo UF Obrigatório</span>";
            $status = false;
        } else
            $dados['uf'] = $_POST['cliente'];

        if ($status = true) {
            $cliente = array();
            $cliente  = $_POST['cliente'];

            if ($this->usuarioModel->salvarNovoUsuario($cliente) == true ) {
                $_SESSION['novo_cliente']['nome'] = addslashes($_POST['cliente']['nome']);
            }

        }

        $this->loadTemplate("clientecadastrarView", $dados);
    }

    public function logar()
    {
        $dados = array();
        if (isset($_POST['emailCad']) && empty($_POST['emailCad'])) {
            $dados['erroEmailCad'] = "<span class='erro_cad_cliente'>Campo E-mail Obrigatório</span>";
            $status = false;
        } else
            $dados['emailCad'] = $_POST['emailCad'];
        if (isset($_POST['senhaCad']) && empty($_POST['senhaCad'])) {
            $dados['erroSenhaCad'] = "<span class='erro_cad_cliente'>Campo Senha Obrigatório</span>";
            $status = false;
        } else
            $dados['senhaCad'] = $_POST['senhaCad'];

        if ($status = true) {
            $email = trim(addslashes($_POST['emailCad']));
            $senha = trim(addslashes($_POST['senhaCad']));
            
            if ($this->usuarioModel->verificaLoginSenha($email, $senha) == true) {
                $dadosCliente = $this->usuarioModel->verificaLoginSenha($email, $senha);
                $_SESSION['cliente'] = array('idUser'=>'', 'nome'=>'');
                foreach ($dadosCliente as $dados)
                    $_SESSION['cliente']['idUser'] = $dados['idusuarios'];{
                    $_SESSION['cliente']['nome'] = $dados['nome'];
                }
                header("Location: /home");
            } else {
                //Colocar o erro de senha ou login
            }

        }

        $this->loadTemplate("identificacaoView", $dados);
    }
}