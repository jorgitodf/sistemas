<?php

class UfModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUfs() {
        $array = array();
        $sql = "SELECT idufs, uf FROM ufs";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}