<?php

include_once 'funkcije.php';

session_start();

$putanjaAPP = "/Decklyst/";
$naslovAPP="RIIS";
$appID="EDUNOVAAPP";

$brojRezultataPoStranici=10;
if($_SERVER["HTTP_HOST"]==="phpprog.byethost10.com"){
	$host="sql212.byethost.com";
	$dbname="b10_21251223_decklyst";
	$dbuser="b10_21251223";
	$dbpass="jasamveco1";
	$dev=false;
}else{
	$host="localhost";
	$dbname="duelyst";
	$dbuser="edunova";
	$dbpass="edunova";
	$dev=true;
}


try{
	$veza = new PDO("mysql:host=" . $host . ";dbname=" . $dbname,$dbuser,$dbpass);
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8';");
	$veza->exec("SET NAMES 'utf8';");
}catch(PDOException $e){
	
	switch($e->getCode()){
		case 1049:
			header("location: " . $putanjaAPP . "greske/kriviNazivBaze.html");
			exit;
			break;
		default:
			header("location: " . $putanjaAPP . "greske/greska.php?code=" . $e->getCode());
			exit;
			break;
	}
	

}
