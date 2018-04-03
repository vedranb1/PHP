<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();
	
	$izraz=$veza->prepare("select b.sifra from karta a inner join tip b on a.tip=b.sifra where a.sifra=:sifraKarte;");
	$izraz->bindValue("sifraKarte", $_POST["sifraKarte"], PDO::PARAM_INT);
	$izraz->execute();
	$provjera=$izraz->fetchColumn();
	
	if($provjera==4){
		echo "Nije moguće ukloniti generala";
	}else {
		$izraz=$veza->prepare("delete from karta_deck where karta=:sifraKarte and deck=:sifraDeck limit 1;");	
		$izraz->execute($_POST);
		echo "OK";
	}

	
