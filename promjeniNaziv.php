<?php
include_once 'konfiguracija.php'; 
provjeraOvlasti();
	
	$izraz = $veza->prepare("
			update deck set naziv=:newName where sifra=:sifraDeck;

	");
	$izraz->execute($_POST);
	