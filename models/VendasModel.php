<?php

class VendasModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getPedidosUsuario($idUser) {
        $array = array();
        if (!empty($idUser)) {
            $sql = "SELECT vendas.idvendas, vendas.valor, vendas.forma_pag, pagamentos.tipo, status_pagamento.idstatus_pagamento, "
                    . "status_pagamento.status_pagamento FROM vendas LEFT JOIN status_pagamento ON status_pagamento.idstatus_pagamento"
                    . " = vendas.status_pag LEFT JOIN pagamentos ON pagamentos.idpagamentos = vendas.forma_pag WHERE usuario_id"
                    . " = '$idUser'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }            
        }
        return $array;
    }
    
    public function getPedidosUsuarioDetalhe($id, $idUser) {
        $array = array();
        if (!empty($id) && !empty($idUser)) {
           
            $sql = "SELECT idvendas_produtos, vendas.idvendas, produtos.nome, produtos.imagem, produtos.preco, vendas_produtos.quantidade, "
                    . "produtos.descricao FROM vendas LEFT JOIN usuarios ON vendas.usuario_id = usuarios.idusuarios LEFT JOIN "
                    . "vendas_produtos ON vendas_produtos.venda_id = vendas.idvendas  LEFT JOIN produtos ON produtos.idprodutos"
                    . " = vendas_produtos.produto_id WHERE venda_id = '$id' AND vendas.usuario_id = '$idUser'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }  
        }
        return $array;
    }    
    
    public function setVenda($endereco, $subTotal, $tipo_pgm, $userId, $produtos) {
        /*
        1 => Aguradando Pagamento
        2 => Aprovada
        3 => Cancelada
        */
        $status = '1';
        $link = '';
        
        $sql = "Insert Into vendas (`endereco`, `valor`, `forma_pag`, `usuario_id`, `status_pag`, `pg_link`) VALUES "
                . "('$endereco', '$subTotal', '$tipo_pgm', '$userId', '$status', '$link')";
        $sql = $this->db->query($sql);
        $id_venda = $this->db->lastInsertId();        
        
        if ($tipo_pgm == '1') {
            $status = '2';
            $link = '/carrinho/obrigado';
            $this->db->query("UPDATE vendas SET `status_pag` = '$status' WHERE idvendas = '".$id_venda."'");
        } elseif ($tipo_pgm == '2') {
            // Integração com Pagamentos
            require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
            $requerimentoPagamento = new PagSeguroPaymentRequest();
            foreach ($produtos as $prod) {
                $requerimentoPagamento->addItem($prod['idprodutos'], $prod['nome'], 1, $prod['preco']);
            }
            $requerimentoPagamento->setCurrency("BRL");
            $requerimentoPagamento->setReference($id_venda);
            $requerimentoPagamento->setRedirectURL("http://sistema.pc/carrinho/obrigado");
            $requerimentoPagamento->addParameter("notificationURL", "http://sistema.pc/carrinho/notificacao");
                try {
                    $cred = PagSeguroConfig::getAccountCredentials();
                    $link = $requerimentoPagamento->register($cred);
                } catch (PagSeguroServiceException $exc) {
                    echo $exc->getMessage();
                }
            }

        foreach ($produtos as $prod) {
            $sql = "Insert Into vendas_produtos (`venda_id`, `produto_id`, `quantidade`) VALUES ('$id_venda', '".$prod['idprodutos']."', '1')";
            $sql = $this->db->query($sql);
        }
        unset($_SESSION['carrinho']);        
        return $link;        
    }

    public function verificarVendas() {
        require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
        $code = '';
        $type = '';
        
        if (isset($_POST['notificationCode']) && isset($_POST['notificationType'])) {
            $code = trim($_POST['notificationCode']);
            $type = trim($_POST['notificationType']);
            $notificationType = new PagSeguroNotificationType($type);
            $strType = $notificationType->getTypeFromValue();
            $credenciais = PagSeguroConfig::getAccountCredentials();
                try {
                    $transacao = PagSeguroNotificationService::checkTransaction($credenciais, $code);
                    $ref = $transacao->getReference();
                    $status = $transacao->getStatus()->getValue();
                    $novoStatus = 0;
                    switch ($status) {
                        case '1':
                        case '2':
                            $novoStatus = '1';
                            break;
                        case '3':
                        case '4':
                            $novoStatus = '2';
                            break;  
                        case '6':
                        case '7':
                            $novoStatus = '3';
                            break;                        
                    }
                    $this->db->query("UPDATE vendas SET status_pag = '$novoStatus' WHERE idvendas = '$ref'");
                    
                } catch (PagSeguroServiceException $exc) {
                    echo "Falhou: ".$exc->getMessage();
                }
            }
    }
    
}
