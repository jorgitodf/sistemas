<?php

class pedidosController extends Controller {
    
    protected $vendasModel;
    
    function __construct() {
        parent::__construct();
        $this->vendasModel = new VendasModel();
    }
    
    public function index() {
        
        $dados = array();
        
        if (isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])) {
            $dados['pedidos'] = $this->vendasModel->getPedidosUsuario($_SESSION['cliente']);
            $this->loadTemplate('pedidosView', $dados);            
        } else {
            header("Location: /login");
        }
       
    }
    
        public function ver($id) {
        if (!empty($id)) {
            $dados = array('idvenda' => '', 'pedido' => array());
            $id = addslashes($id);
            $idUser = $_SESSION['cliente'];
            $detalhes = $this->vendasModel->getPedidosUsuarioDetalhe($id, $idUser);
            if (!empty($detalhes)) {
                foreach ($detalhes as $value) {
                    $dados['idvenda'] = $value['idvendas'];
                }
                $dados['pedido'] = $detalhes;
                $this->loadTemplate('pedidos_verView', $dados);
            } else {
                header("Location: /pedidos");
            }
        } else {
            header("Location: /pedidos");
        }
       
    }
}
