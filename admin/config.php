<?php
require 'environment.php';

global $config;
$config = array();
if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'camelo69';
} else {
    $config['dbname'] = 'sistema';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'camelo69';    
}

