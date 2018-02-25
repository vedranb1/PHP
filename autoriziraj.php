<?php

if(!isset($_POST["email"]) || !isset($_POST["lozinka"])){
	exit;
}

if($_POST["email"]==="mario@edunova.hr" && $_POST["lozinka"]==="e"){
	include_once 'konfiguracija.php';
	$o = new stdClass();
	$o->ime="Edunova";
	$o->prezime = "Zaposlenik";
	$o->uloga="oper";
	$_SESSION[$appID."autoriziran"]=$o;
	header("location: privatno/nadzornaPloca.php");
}else if ($_POST["email"]==="ivo@edunova.hr" && $_POST["lozinka"]==="i"){
	include_once 'konfiguracija.php';
	$o = new stdClass();
	$o->ime="Ivo";
	$o->prezime = "Zaposlenik";
	$o->uloga="admin";
	$_SESSION[$appID."autoriziran"]=$o;
	header("location: privatno/nadzornaPloca.php");
}else{
	header("location: login.php?neuspjelo&email=" . $_POST["email"]);
}
