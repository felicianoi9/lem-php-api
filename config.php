<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT=='development'){

	$config['dbname'] = 'lemaapi';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['url_site'] = 'localhost';
	$config['dir'] = 'lema-api';

	define("BASE","http://".$config['url_site']."/".$config['dir']."/");

}else{

	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
	$config['url_site'] = '';
	$config['dir'] = '';

	define("BASE","https://".$config['url_site']."/".$config['dir']."/");



}

global $db;

try {

	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'] );

} catch(PDOException $e){

	echo "ERRO: ".$e->getMessage();
	exit;
}