<?php
include_once 'konfiguracija.php'; 
provjeraOvlasti();
	
	$izraz = $veza->prepare("
			select naziv from deck where sifra=:sifraDeck and naziv=:nazivDeck;

	");
	$izraz->execute($_POST);
	$rezultati = $izraz->fetchColumn();
	echo json_encode($rezultati);