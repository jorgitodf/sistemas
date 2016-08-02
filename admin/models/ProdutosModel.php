<?php

class ProdutosModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getProdutos($offset, $limit) {
        $array = array();
        $sql = "Select *, (Select categorias.nome_categoria From categorias Where categorias.idcategorias = produtos.categoria_id) as categoria From produtos LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getTotalProdutos() {
        $q = 0;
        $sql = "SELECT COUNT(*) AS C FROM produtos";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $q = $sql->fetch();
            $q = $q['C'];
        }
        return $q;        
    }
    
    
}