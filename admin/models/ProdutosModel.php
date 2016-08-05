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

    public function inserirProduto($nome, $descricao, $categoria, $preco, $quantidade, $md5imagem) {

        $sql = "INSERT INTO produtos (`nome`, `imagem`, `preco`, `quantidade`, `descricao`,  `categoria_id`) VALUES ('$nome', '$md5imagem','$preco', 
                '$quantidade', '$descricao', '$categoria')";
        $this->db->query($sql);
    }

    public function getProduto($id) {
        $array = array();
        $sql = "SELECT * FROM produtos WHERE idprodutos = '$id'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    
    public function updateProduto($nome, $preco, $quantidade, $descricao, $categoria, $id) {
        if (!empty($id) && !empty($nome) && !empty($descricao) && !empty($categoria) && !empty($preco) && !empty($quantidade)) {
            $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, quantidade = '$quantidade', descricao = '$descricao', 
                    categoria = '$categoria' WHERE idprodutos = '$id')";
            $this->db->query($sql);
        }
    }

    public function updateImagem($id, $imagem) {
        $sql = "UPDATE produtos SET imagem = '$imagem' WHERE idprodutos = '$id')";
        $this->db->query($sql);
    }
}