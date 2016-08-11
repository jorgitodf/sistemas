<?php

require 'environment.php';

global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'camelo69';    
}


/*
    Configuraçao do Virtual Host do Apache

    C:\xampp\apache\conf\extra\httpd-vhosts.conf

    ##NameVirtualHost localhost:80
    ##<VirtualHost *:80>
    ##ServerName sistema
    ##DocumentRoot "C:/XAMPP/htdocs/sistema"
    ##</VirtualHost>

*/

