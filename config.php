<?php

require 'environment.php';

$hostname = getenv("USERNAME");

global $config;
$config = array();
if (ENVIRONMENT == 'development' && $hostname == 'JORGITO-NB') {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'rootnb';
    $config['dbpass'] = '!Camelo69';
	$config['ambiente'] = ENVIRONMENT;
	$config['hostname'] = $hostname;
} elseif (ENVIRONMENT == 'development' && $hostname == 'JORGITO-PC') {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'camelo69';
	$config['ambiente'] = ENVIRONMENT;
	$config['hostname'] = $hostname;
} else {
	$config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
	$config['ambiente'] = ENVIRONMENT;
	$config['hostname'] = $hostname;
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

