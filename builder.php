<?php include_once 'konfiguracija.php'; 
provjeraOvlasti(); ?>
<?php $stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1; ?>
<?php 
	$sifra = $_SESSION[$appID."autoriziran"]->sifra;
	$izraz=$veza->prepare("insert into deck values (null, '-', :sifra)");
	$izraz->bindValue("sifra", $sifra, PDO::PARAM_INT);
	$izraz->execute();
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
<?php include_once 'include/header.php'; ?>
</head> 
  <body>
    <div id="page">
		<?php include_once 'include/izbornik.php'; ?>
	
				<?php 
					$uvjet = "%" . (isset($_GET["uvjet"]) ? $_GET["uvjet"] : "") . "%";
					
						$izraz = $veza->prepare("
										
							select count(b.sifra)
							from tip a inner join karta b on a.sifra=b.tip inner join klasa c on b.klasa=c.sifra 
							where concat(b.naziv, c.naziv, a.naziv, b.mana, concat_ws(' / ', b.attack, b.health), b.rarity)
							like :uvjet
										
							");
						$izraz->execute(array("uvjet"=>$uvjet));
						$ukupnoRedova = $izraz->fetchColumn();
						$ukupnoStranica = ceil($ukupnoRedova/$brojRezultataPoStranici);
						
						if($stranica<1){
							$stranica=1;
						}
						if($ukupnoStranica>0 && $stranica>$ukupnoStranica){
							$stranica=$ukupnoStranica;
						}
						$izraz = $veza->prepare("select b.sifra, b.naziv, c.naziv as klasa, a.naziv as tip, b.mana, concat_ws(' / ', b.attack, b.health) as stats, b.rarity
						from tip a inner join karta b on a.sifra=b.tip inner join klasa c on b.klasa=c.sifra 
						where concat(b.naziv, c.naziv, a.naziv, b.mana, concat_ws(' / ', b.attack, b.health), b.rarity)
						like :uvjet group by b.naziv, c.naziv, a.naziv, b.mana, stats, b.rarity 
						order by b.naziv limit :stranica, :brojRezultataPoStranici;
						");
						$izraz->bindValue("stranica", $stranica * $brojRezultataPoStranici -  $brojRezultataPoStranici , PDO::PARAM_INT);
						$izraz->bindValue("brojRezultataPoStranici", $brojRezultataPoStranici, PDO::PARAM_INT);
						$izraz->bindParam("uvjet", $uvjet);
						$izraz->execute();
						$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
						
						?>		
	<div id="body">
			<div class="header">
				<div class="tabl">
					<form method="get">
								<input type="text" name="uvjet" 
								placeholder="uvjet pretraživanja"
								value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
							</form>
						
							<table class="add" style="width: 50%; float: left; ">
								<thead>
									<tr>
										<th>Name</th>
										<th>Mana Cost</th>
										<th>Attack / Health</th>
										<th>Rarity</th>
										<th><i class="fas fa-plus-square"></i></th>
									</tr>
								</thead>
								<tbody>
											
										
									<?php
									foreach ($rezultati as $red):
									?>
											<tr>
												<td class="forcedwidth"><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
												<td class="mana"><?php echo $red->mana; ?></td>
												<td class="stats"><?php echo $red->stats; ?></td>
												<td class="rarity"><?php echo $red->rarity; ?></td>
												<td class="dodaj">
													<?php 
														$sifK=$red->sifra;
														$izrazz=$veza->prepare("select deck, count(karta) as ukupno 
														from karta_deck where karta=:sifraKarte group by deck;");
														$izrazz->bindValue("sifraKarte", $sifK, PDO::PARAM_INT);
														$izrazz->execute();
														$rez=$izrazz->fetch(PDO::FETCH_OBJ);
														error_reporting(E_ERROR);
														if($rez->ukupno==3): ?>
													<a style="opacity: 0.6; cursor: not-allowed;" class="dodajKartu" id="dk_<?php echo $rez->deck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-plus-square"></i></a></th>
													<?php endif; ?> 
													<a class="dodajKartu" id="dk_<?php echo $rez->deck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-plus-square"></i></a></th>
											</tr>
											
										<?php endforeach; ?>
											
										</tbody>
							</table>
							<table id="inDeck" class="add" style="width: 50%; float:left;">
								<thead>
									<tr>
										<th>Name</th>
										<th>Mana Cost</th>
										<th>Attack / Health</th>
										<th>Rarity</th>
										<th class="dodaj"><i class="fas fa-plus-square"></i></th>
										<th class="ukloni"><i class="fas fa-minus-square"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$izraz = $veza->prepare("select c.sifra, b.deck as sifraDeck, c.naziv, c.mana, concat_ws(' / ', c.attack, c.health) as stats, c.rarity
									from deck a inner join karta_deck b on a.sifra=b.deck
									inner join karta c on b.karta=c.sifra
									where a.sifra=1;
									");
									$izraz->execute();
									$inDeck = $izraz->fetchAll(PDO::FETCH_OBJ);
									foreach ($inDeck as $red): 
									?>
									<tr>
										<td class="naziv"><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
										<td class="mana"><?php echo $red->mana; ?></td>
										<td class="stats"><?php echo $red->stats; ?></td>
										<td class="rarity"><?php echo $red->rarity; ?></td>
										<td class="dodaj"><a class="dodajKartu" id="dk_<?php echo $red->sifraDeck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-plus-square"></i></a></td>
										<td class="ukloni"><a class="ukloniKartu" id="uk_<?php echo $red->sifraDeck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-minus-square"></i></a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					
				</div>
			</div>
	</div>
    <?php include_once 'include/skripte.php'; ?>
    <script>
    
    	var sifraKarte;
    	var sifraDeck;
    	var nazivKarte;
    	var manaKarte;
    	var statsKarte;
    	var rarityKarte;
    	var dodaj;
    	var ukloni;
    	
    	
    	
    	function definirajDogadaj(){
            
            $(".dodajKartu").off("click");
            
            $(".dodajKartu").click(function(){
    		
			
			sifraDeck = $(this).attr("id").split("_")[1];
			sifraKarte = $(this).attr("id").split("_")[2];
    		nazivKarte = $(this).parent().parent().find("td:first").html();
    		manaKarte = $(this).parent().parent().find(".mana").html();
    		statsKarte = $(this).parent().parent().find(".stats").html();
    		rarityKarte = $(this).parent().parent().find(".rarity").html();
    		dodaj = $(this).parent().parent().find(".dodaj").html();
    		ukloni = $(this).parent().parent().parent().parent().parent().find(".ukloni").html();
    		$.ajax({
			  type: "POST",
			  url: "dodaj.php",
			  data: "sifraKarte=" + sifraKarte + "&sifraDeck=" + sifraDeck,
			  success: function(vratioServer){
			  	if(vratioServer==="OK"){
			  		 $("#inDeck > tbody").append("<tr><td class=\"naziv\">" + nazivKarte + "</td>" + "<td class=\"mana\">" + manaKarte + "</td>" + "<td class=\"stats\">" + statsKarte + "</td>"
			  	  + "<td class=\"rarity\">" + rarityKarte + "</td>" + "<td class=\"dodaj\"><a class=\"dodajKartu\" id=\"dk_" + sifraKarte + "\" href=\"#\"><i class=\"fas fa-plus-square\"></i></a></td>" + 
			  	  "<td class=\"ukloni\"><a class=\"ukloniKartu\" id=\"uk_" + sifraKarte + "\" href=\"#\"><i class=\"fas fa-minus-square\"></i></a></td></tr>");
                  definirajDogadaj();
			  	}else{
			  		alert(vratioServer);
			  	}
			  	
			  }
			});
    	return false;
    	});
    	
        $(".ukloniKartu").off("click");
    	$(".ukloniKartu").click(function(){
    		
			sifraKarte = $(this).attr("id").split("_")[1];
    		var stavka = $(this);
    		$.ajax({
			  type: "POST",
			  url: "ukloni.php",
			  data: "sifraKarte=" + sifraKarte,
			  success: function(vratioServer){
			  	stavka.parent().parent().remove();
			  }
			});
    	return false;
    	});
        }
        
        definirajDogadaj();
            
    </script>
  </body>
</html>
