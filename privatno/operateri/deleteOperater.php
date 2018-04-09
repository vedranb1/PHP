<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();
	
		$izraz=$veza->prepare("delete from operater where sifra=:sifraOperater limit 1;");	
		$izraz->execute($_POST);
		echo "OK";
	

	
