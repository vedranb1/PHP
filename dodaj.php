<?php include_once 'konfiguracija.php'; 
provjeraOvlasti();
	//$izraz=$veza->prepare("select sifra from deck where naziv='-'");
	//$izraz->execute();
	//$sifraDeck = $izraz->fetchColumn();
	
	
	$izraz=$veza->prepare("select count(*) from karta_deck where karta=:sifraKarte and deck=:sifraDeck;");
	$izraz->execute($_POST);
	$ukupnoKopija = $izraz->fetchColumn();
	$izraz=$veza->prepare("select count(*) from karta_deck;");
	$izraz->execute();
	$ukupnoKarata = $izraz->fetchColumn();
	$izraz=$veza->prepare("select b.sifra from karta a inner join tip b on a.tip=b.sifra where a.sifra=:sifraKarte;");
	$izraz->bindValue("sifraKarte", $_POST["sifraKarte"], PDO::PARAM_INT);
	$izraz->execute();
	$provjera=$izraz->fetchColumn();
	
	
	if($ukupnoKopija>=3 || $ukupnoKarata>=40){
		echo "Previse kopija/karata, nisam dodao";
	}elseif($provjera==4){
		echo "Samo 1 general po deku";
	}else{
		$izraz=$veza->prepare("insert into karta_deck values (:sifraKarte, :sifraDeck);");
		$izraz->execute($_POST);
		echo "OK";
	}
	
	