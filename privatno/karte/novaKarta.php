<?php

include_once '../../konfiguracija.php'; 
provjeraOvlasti();

$veza->beginTransaction();

	$izraz = $veza->prepare("
	insert into karta (sifra,	naziv,	klasa,	tip,	mana,	ogranicenje,	attack,		health,		rarity)
			   values (null,	'',		1,		1,			1,		3,		1,		1,		'');");
	$izraz->execute();
	
	$sifraKarte = $veza->lastInsertId();
$veza->commit();

header("location: editKarta.php?sifra=" . $sifraKarte);
