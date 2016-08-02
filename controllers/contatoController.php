<?php

class contatoController extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array('msg'=>'');
        if (isset($_POST) && !empty($_POST)) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $msg = addslashes($_POST['mensagem']);
            
            $email_sender = "siscadcons@gmail.com";
            $email_destinatario = "jspaiva.1977@gmail.com";
            $assunto = "Contato pelo site em :".date('d/m/Y');
             
            
            $html = "Nome: ".$nome."<br/> E-mail: ".$email."<br/> Mensagem: ".$msg;
            
            $headers = 'MIME: Version: 1.1'."\r\n";
            $headers .= 'From: Content-type: text/html; charset=utf-8'."\r\n";
            $headers .= 'From: siscadcons@gmail.com'."\r\n";
            $headers .= 'Return-Path: siscadcons@gmail.com'."\r\n";
            $headers .= 'Reply-To: '.$email."\r\n";
            $headers .= 'X-Mailer: PHP/'.phpversion();
            
            mail($email_destinatario, $assunto, $html, $headers, $email_sender);
        }
        
        
        $dados['msg'] = "E-mail enviado com sucesso";

        $this->loadTemplate('contatoView', $dados);
        
    }
}
