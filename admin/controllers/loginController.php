<?php

class loginController extends Controller {
    
    protected $usuarioModel;
    
    function __construct() {
        parent::__construct();
        $this->usuarioModel = new UsuarioModel();
    }
    
    public function index() {
        
        $dados = array('aviso' => '');
        
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
            if ($this->usuarioModel->isExiste($email, $senha)) {
                $userId = $this->usuarioModel->getId($email);
                $_SESSION['adminLogin'] = $userId;
                header("Location: /admin");
            } else {
                $dados['aviso'] = "<span class='alert alert-danger erro_categoria' role='alert'>E-mail e/ou Senha não estão corretos!</span>";
            }
          
        } elseif (isset($_POST['email']) && isset($_POST['senha']) && empty($_POST['email']) && empty($_POST['senha'])) {
            $dados['aviso'] = "<span class='alert alert-danger erro_categoria' role='alert'>Preencha todos os campos!</span>";
        }  
        $this->loadTemplate('loginView', $dados);              
  
    }
    
    public function logout() {
        unset($_SESSION['adminLogin']);
        header("Location: /admin/login");
    }    
}