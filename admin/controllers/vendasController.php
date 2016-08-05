<?php

class vendasController extends Controller {

    protected $vendasModel;
    
    function __construct() {
        parent::__construct();
        LoginAdminHelper::isLoogedAdmin();
        $this->vendasModel = new VendasModel();
    }

    public function index() {
        $dados = array('vendas'=>array());
        $dados['vendas'] = $this->vendasModel->getVendas();


        $this->loadTemplate('vendasView', $dados);
    }

}
