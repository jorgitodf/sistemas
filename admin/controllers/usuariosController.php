<?php

class usuariosController extends Controller {

    function __construct() {
        parent::__construct();
        LoginAdminHelper::isLoogedAdmin();
    }

    public function index() {
        $dados = array();

        //$this->loadTemplate('');
    }

}
