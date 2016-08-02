<?php

class ProdutoModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function listarProdutos($qt = 0) {
        $sql = "Select * From produtos ORDER BY RAND( ) ";
        
        if ($qt > 0) {
            $sql .= "LIMIT ".$qt;
        }

        $sql = $this->db->query($sql);

        $produtos = array();
        if ($sql->rowCount() > 0) {
            $produtos = $sql->fetchAll();
        }
        return $produtos;
    }
    
    public function listarCategoria($cat) {
        $sql = "Select * From produtos WHERE categoria_id = '$cat'";
        $sql = $this->db->query($sql);
        
        $produtos = array();
        if ($sql->rowCount() > 0) {
            $produtos = $sql->fetchAll();
        }
        return $produtos;
        
    }
    
    public function verProduto($id) {
        $sql = "Select * From produtos WHERE idprodutos = '$id'";
        $sql = $this->db->query($sql);
        
        $produto = array();
        if ($sql->rowCount() > 0) {
            $produto = $sql->fetch();
        }
        return $produto;
        
    }  
    
    public function verProdutoCarrinho($id) {
        $array = array();
        if (!empty($id)) {
        $sql = "Select idprodutos, nome, imagem, preco, descricao, categoria_id From produtos WHERE idprodutos = '$id'";
        $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
        }
        return $array;
    }



    
}