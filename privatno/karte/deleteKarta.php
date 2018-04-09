<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();
	
		$izraz=$veza->prepare("delete from karta where sifra=:sifraKarta limit 1;");	
		$izraz->execute($_POST);
		echo "OK";
	

	
