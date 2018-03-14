<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();

if(isset($_GET["sifra"])){
	$izraz=$veza->prepare("select max(sifra) from deck;");
	$sifrad=$izraz->fetchColumn();
	$izraz=$veza->prepare("insert into karta_deck values (:sifrak, 1);");	
	$izraz->bindValue("sifrak", $_GET["sifra"], PDO::PARAM_INT);
	$izraz->execute();
	header("location: builder.php");
}