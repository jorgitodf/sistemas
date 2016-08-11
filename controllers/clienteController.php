<?php

class clienteController extends Controller {


    function __construct() {
        parent::__construct();

    }

    public function cadastrar() {

        $dados = array();

        $this->loadTemplate("clientecadastrarView", $dados);
    }

}