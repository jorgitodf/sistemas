<?php

class clienteController extends Controller {

    protected $ufsModel;
    protected $tipoLogradourosModel;
    protected $orgaosExpedidoresModel;

    function __construct() {
        parent::__construct();
        $this->ufsModel = new UfModel();
        $this->tipoLogradourosModel = new TipoLogradourosModel();
        $this->orgaosExpedidoresModel = new OrgaosExpedidoresModel();
    }

    public function cadastrar() {
        $dados = array();
        $dados['ufs'] = $this->ufsModel->getAllUfs();
        $dados['tipoLogradouros'] = $this->tipoLogradourosModel->getAllTipoLogradouros();
        $dados['orgaosExpedidores'] = $this->orgaosExpedidoresModel->getAllOrgaoExpedidores();

        $this->loadTemplate("clientecadastrarView", $dados);
    }

}