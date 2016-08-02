<?php

class Controller {
    
    protected $db;
  
    public function __construct() {
        global $config;
        $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
        
    }
    
    public function loadView($viewName, $viewData = array()) {
        extract($viewData); // transforma o array em variáveis
        include 'views/'.$viewName.'.php';
    }
    
    public function loadTemplate($viewName, $viewData = array()) {
       
        $sql = "Select * From categorias";
        $sql = $this->db->query($sql);
        $menu = array();
        if ($sql->rowCount() > 0) {
            $menu = $sql->fetchAll();
        } else {
            echo "Não Achou";
        }

        include 'views/template.php';
    }
    
    public function loadViewInTemplate($viewName, $viewData) {
        extract($viewData); // transforma o array em variáveis
        include 'views/'.$viewName.'.php';
    }
    
    
    
}