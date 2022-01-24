<?php

function getConnection(){
  $servername = "sql655.main-hosting.eu";
  $username = "u832941599_valdomiro";
  $password = "0388Dac4.";
  $database = "u832941599_comprecasas";

	try{
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
		$con = new PDO("mysql:host=$servername; dbname=$database;", $username, $password, $options);
		return $con;
	} catch (Exception $e){
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}
