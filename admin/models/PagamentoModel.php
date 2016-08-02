<?php

class PagamentoModel extends Model {
 
    public function __construct() {
        parent::__construct();
    }

    public function getPagamentos() {
        $pagamentos = array();
        $sql = "Select * From pagamentos";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $pagamentos = $sql->fetchAll();
        }
        return $pagamentos;
    }

}
