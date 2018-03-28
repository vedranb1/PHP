<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();
	//$izraz=$veza->prepare("select sifra from deck where naziv='-'");
	//$izraz->execute();
	//$sifraDeck = $izraz->fetchColumn();
	
	
	$izraz=$veza->prepare("select count(*) from karta_deck where karta=:sifraKarte and deck=:sifraDeck");
	$izraz->execute($_POST);
	$ukupno = $izraz->fetchColumn();
	
	if($ukupno>=3){
		echo "Više od 3 karte, nisam dodao";
	}else{
		$izraz=$veza->prepare("insert into karta_deck values (:sifraKarte, :sifraDeck);");
		$izraz->execute($_POST);
		echo "OK";
	}