<?php

class UsuarioModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function isExiste($email, $senha = '') {
        if (!empty($senha)) {
            $sql = "Select * From usuarios WHERE email = '$email' AND senha = MD5('$senha')";
        } else {
            $sql = "Select * From usuarios WHERE email = '$email'";
        }
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }        
    }
  
    public function criar($nome, $email, $senha) {
        $sql = "Insert Into usuarios SET nome = '$nome', email = '$email', senha = MD5('$senha')";
        $this->db->query($sql);
        return $this->db->lastInsertId();
    }        

    public function getId($email) {
        $idUser = 0;
        $sql = "Select idusuarios From usuarios WHERE email = '$email'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $idUser = $sql['idusuarios'];
        }
        return $idUser;
    }

    public function verificaCpf($cpf) {
        if (!empty($cpf)) {
            $sql = "Select cpf From usuarios WHERE cpf = '$cpf'";
        }
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function salvarNovoUsuario($cliente) {
        if (!empty($cliente)) {

            $cidade = trim(addslashes($cliente['cidade']));
            $id_ufs = trim(addslashes($cliente['uf']));
            $sql = "Insert Into cidades SET cidade = '$cidade', id_ufs = '$id_ufs'";
            $this->db->query($sql);
            $idCidade = $this->db->lastInsertId();

            $bairro = trim(addslashes($cliente['bairro']));
            $sql = "Insert Into bairros SET bairro = '$bairro', id_cidades = '$idCidade'";
            $this->db->query($sql);
            $idBairro = $this->db->lastInsertId();

            $logradouro = trim(addslashes($cliente['log_descricao']));
            $id_tp_logradouro = trim(addslashes($cliente['logradouro']));
            $sql = "Insert Into logradouros SET logradouro = '$logradouro', id_tp_logradouros = '$id_tp_logradouro'";
            $this->db->query($sql);
            $idLogradouro = $this->db->lastInsertId();

            $nome = trim(addslashes($cliente['nome']));
            $cpf = trim(addslashes($cliente['cpf_cad']));
            $email = trim(addslashes($cliente['email-cad']));
            $senha = trim(addslashes($cliente['senha_cad']));
            $tipo = "Cliente";
            $rg = trim(addslashes($cliente['rg']));
            $data_nascimento = trim(addslashes($cliente['data_nascimento']));
            date_default_timezone_set('America/Sao_Paulo');
            $data_cadastro = date('Y-m-d H:i:s');
            $id_orgao_expedidores = trim(addslashes($cliente['orgao_expedidor']));
            $sql = "Insert Into usuarios SET nome = '$nome', cpf = '$cpf', email = '$email', senha = MD5('$senha'), tipo = '$tipo', rg = '$rg', data_nascimento = '$data_nascimento', data_cadastro = '$data_cadastro', id_orgao_expedidores = '$id_orgao_expedidores'";
            $this->db->query($sql);
            $idUsuario = $this->db->lastInsertId();

            $complemento = trim(addslashes($cliente['complemento']));
            $numero = trim(addslashes($cliente['numero']));
            $cep = trim(addslashes($cliente['cep']));
            $sql = "Insert Into enderecos SET complemento = '$complemento', numero = '$numero', cep = '$cep', id_usuarios = '$idUsuario', id_bairros = '$idBairro', id_logradouros = '$idLogradouro'";
            $this->db->query($sql);
            $idEndereco = $this->db->lastInsertId();

            $ddd = trim(addslashes($cliente['ddd']));
            $telefone = trim(addslashes($cliente['telefone']));
            $ddd_cel = trim(addslashes($cliente['ddd-cel']));
            $celular = trim(addslashes($cliente['celular']));
            $sql = "INSERT INTO telefone (`ddd_tel_res`, `telefone_residencial`, `ddd_tel_cel`, `telefone_celular`, `id_usuarios`) VALUES ('$ddd','$telefone', '$ddd_cel', '$celular', '$idUsuario')";
            $this->db->query($sql);
            $idTelefone = $this->db->lastInsertId();

            if (!empty($idTelefone) && !empty($idEndereco) && !empty($idUsuario) && !empty($idLogradouro) && !empty($idBairro) && !empty($idCidade)) {
                return true;
            } else {
                return false;
            }

        }

    }

    public function verificaLoginSenha($email, $senha) {
        $array = array();
        $sql = "SELECT idusuarios, nome, email, senha FROM usuarios WHERE email = '$email' AND senha = MD5('$senha')";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchALL(PDO::FETCH_ASSOC);
        }
        return $array;
    }

    
}

