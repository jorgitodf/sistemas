<?php

class CategoriaModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getNomeCategoria($id) {
        $sql = "Select nome_categoria From categorias WHERE idcategorias = '$id'";
        $sql = $this->db->query($sql);
        $nome = "";
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $nome = $sql['nome_categoria'];
        }
        return $nome;
    }

    
}