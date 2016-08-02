<?php

class CategoriasModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getCategorias() {
        $array = array();
        $sql = "Select * From categorias";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getCategoria($id) {
        $array = array();
        $sql = "Select * From categorias WHERE idcategorias = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }  
    
    public function editCategorias($id, $nome_categoria) {
        if (!empty($id) && !empty($nome_categoria)) {
            $id = addslashes($id);
            $nome_categoria = addslashes($nome_categoria);
            $sql = "UPDATE categorias SET nome_categoria = '$nome_categoria' WHERE idcategorias = '$id' ";
            $this->db->query($sql);
        }
    }    
    
    public function criaCategoria($nome_categoria) {
        if (!empty($nome_categoria)) {
            $nome_categoria = addslashes($nome_categoria);
            $sql = "INSERT INTO categorias (`nome_categoria`) VALUES ('$nome_categoria')";
            $this->db->query($sql);
            return true;            
        } else {
            return false;
        }
    }
    
    public function removerCategoria($id) {
        $id = addslashes($id);
        $sql = "DELETE FROM categorias WHERE idcategorias = '$id' ";
        $this->db->query($sql);
    }

    
}