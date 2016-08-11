<?php

class OrgaosExpedidoresModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrgaoExpedidores()
    {
        $array = array();
        $sql = "SELECT idorgao_expedidores, orgao_expedidor FROM orgao_expedidores";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchALL(PDO::FETCH_ASSOC);
        }
        return $array;

    }

}