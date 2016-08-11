<?php

class TipoLogradourosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTipoLogradouros() {
        $array = array();
        $sql = "SELECT idtp_logradouros, tp_logradouro FROM tp_logradouros";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchALL(PDO::FETCH_ASSOC);
        }
        return $array;
    }

}