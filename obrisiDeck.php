<?php
include_once 'konfiguracija.php'; 
provjeraOvlasti();
	
	$izraz = $veza->prepare("
			select sifra from deck where sifra=:sifraDeck and naziv=:nazivDeck;

	");
	$izraz->execute($_POST);
	$trazeniDeck=$izraz->fetchColumn();
	$izraz=$veza->prepare("delete from karta_deck where deck=:trazeniDeck");
	$izraz->bindValue("trazeniDeck", $trazeniDeck, PDO::PARAM_INT);
	$izraz->execute();
	$izraz=$veza->prepare("delete from deck where sifra=:trazeniDeck");
	$izraz->bindValue("trazeniDeck", $trazeniDeck, PDO::PARAM_INT);
	$izraz->execute();