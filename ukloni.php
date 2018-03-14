<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();

if(isset($_GET["sifra"])){
	$izraz=$veza->prepare("select max(sifra) from deck;");
	$sifrad=$izraz->fetchColumn();
	$izraz=$veza->prepare("delete from karta_deck where karta=:sifrak");	
	$izraz->bindValue("sifrak", $_GET["sifra"], PDO::PARAM_INT);
	$izraz->execute();
	header("location: builder.php");
}