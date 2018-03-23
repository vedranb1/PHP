<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();


	$izraz=$veza->prepare("delete from karta_deck where karta=:sifraKarte limit 1;");	
	$izraz->execute($_POST);
