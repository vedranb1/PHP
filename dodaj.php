<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();

	$izraz=$veza->prepare("select sifra from deck where naziv='-'");
	$izraz->execute();
	$sifraDeck = $izraz->fetchColumn();
	$izraz=$veza->prepare("insert into karta_deck values (:sifraKarte, :sifraDeck);");
	$izraz->bindValue("sifraDeck", $sifraDeck, PDO::PARAM_INT);	
	$izraz->execute($_POST);
