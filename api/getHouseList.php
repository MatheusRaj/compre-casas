<?php
require_once('dbConnection.php');

function getHouseList(){
	$pdo = getConnection();
	$sql = 'SELECT * FROM houses';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
}