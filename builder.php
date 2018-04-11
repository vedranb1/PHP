<?php include_once 'konfiguracija.php'; 
provjeraOvlasti(); ?>
<?php $stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1; ?>
<?php 
	$sifra = $_SESSION[$appID."autoriziran"]->sifra;
	if(isset($_GET["general"])){
		$sifraGeneral=$_GET["general"];
		$izraz=$veza->prepare("insert into deck values (null, 'New Deck', :sifra);");
		$izraz->bindValue("sifra", $sifra, PDO::PARAM_INT);
		$izraz->execute();
		$izraz=$veza->prepare("select max(sifra) from deck;");
		$izraz->execute();
		$odabranDeck=$izraz->fetchColumn();
		$izraz=$veza->prepare("insert into karta_deck values (:sifraGeneral, :odabranDeck);");
		$izraz->bindValue("sifraGeneral", $sifraGeneral, PDO::PARAM_INT);
		$izraz->bindValue("odabranDeck", $odabranDeck, PDO::PARAM_INT);
		$izraz->execute();
		$izraz=$veza->prepare("select b.sifra
		from karta a inner join klasa b on a.klasa=b.sifra
		where a.sifra=:sifraGeneral;");
		$izraz->bindValue("sifraGeneral", $sifraGeneral, PDO::PARAM_INT);
		$izraz->execute();
		$klasa=$izraz->fetchColumn();
		$_SESSION["traziKlasu"]=$klasa;
		unset($_GET["general"]);
		header("LOCATION: builder.php?sifra=" . $odabranDeck);
	}
	if(isset($_SESSION["traziKlasu"])){
		$klasa=$_SESSION["traziKlasu"];
	}
	if(!isset($_GET["sifra"])){
		$izraz=$veza->prepare("select max(sifra) from deck;");
		$izraz->execute();
		$odabranDeck=$izraz->fetchColumn();
	}
	if(isset($_GET["sifra"])){
		$odabranDeck=$_GET["sifra"];
		}
	$izraz=$veza->prepare("select karta from karta_deck where deck=:odabranDeck");
	$izraz->bindValue("odabranDeck", $odabranDeck, PDO::PARAM_INT);
	$izraz->execute();
	$karta=$izraz->fetchColumn();
	$izraz=$veza->prepare("select klasa from karta where sifra=:karta");
	$izraz->bindValue("karta", $karta, PDO::PARAM_INT);
	$izraz->execute();
	$klasa=$izraz->fetchColumn();
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
						if(isset($_GET["sifra"])){
						$odabranDeck=$_GET["sifra"];
						$izraz=$veza->prepare("select naziv from deck where sifra=:sifraDeck;");
						$izraz->bindValue("sifraDeck", $odabranDeck, PDO::PARAM_INT);
						$izraz->execute();
						$nazivDeck=$izraz->fetchColumn();
						}
						$izraz = $veza->prepare("select b.sifra, b.naziv, c.naziv as klasa, a.naziv as tip, b.mana, concat_ws(' / ', b.attack, b.health) as stats, b.rarity
						from tip a inner join karta b on a.sifra=b.tip inner join klasa c on b.klasa=c.sifra 
						where concat(b.naziv, c.naziv, a.naziv, b.mana, concat_ws(' / ', b.attack, b.health), b.rarity)
						like :uvjet and (c.sifra=:klasa or c.sifra=7) group by b.naziv, c.naziv, a.naziv, b.mana, stats, b.rarity 
						order by b.mana limit :stranica, :brojRezultataPoStranici;
						");
						$izraz->bindValue("klasa", $klasa, PDO::PARAM_INT);
						$izraz->bindValue("stranica", $stranica * $brojRezultataPoStranici -  $brojRezultataPoStranici , PDO::PARAM_INT);
						$izraz->bindValue("brojRezultataPoStranici", $brojRezultataPoStranici, PDO::PARAM_INT);
						$izraz->bindParam("uvjet", $uvjet);
						$izraz->execute();
						$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
						
						?>		
	<div id="body">
			<div class="header">
				
				<div class="tabl">
					<div style="width: 1900px; height: 100px;">
						<?php
						if(isset($nazivDeck)):?>
							<h1 style="position: absolute; margin-top: 28px;"><?php echo $nazivDeck; ?></h1>
						<?php endif; ?>
					<form method="get">
								<input type="text" name="uvjet" 
								placeholder="uvjet pretraživanja"
								value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
							</form>
						</div>
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
														$rez=$izrazz->fetchColumn();
														error_reporting(E_ERROR); ?>
														
													<a class="dodajKartu" id="dk_<?php echo $odabranDeck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-plus-square"></i></a></th>
													
													
											</tr>
											
										<?php endforeach; ?>
											
										</tbody>
							</table>
							<table id="inDeck" class="add" style="width: 50%; float: left; display: block;">
								<thead style="display: inline-block; height: 43px; width: 100%;">
									<tr>
										<th style="height: 10px; line-height: 20px;">Name</th>
										<th style="height: 10px; line-height: 20px;">Mana Cost</th>
										<th style="height: 10px; line-height: 20px;">Attack / Health</th>
										<th style="height: 10px; line-height: 20px;">Rarity</th>
										<th class="dodaj"><i class="fas fa-plus-square"></i></th>
										<th class="ukloni"><i class="fas fa-minus-square"></i></th>
									</tr>
								</thead>
								<tbody style="height: 504px; overflow-y: auto; overflow-x: hidden; display: inline-block; width: 100%;">
									<?php 
									$izraz = $veza->prepare("select c.sifra, b.deck as sifraDeck, c.naziv, c.mana, concat_ws(' / ', c.attack, c.health) as stats, c.rarity
									from deck a inner join karta_deck b on a.sifra=b.deck
									inner join karta c on b.karta=c.sifra
									where a.sifra=:odabranDeck;
									");
									$izraz->bindValue("odabranDeck", $odabranDeck, PDO::PARAM_INT);
									$izraz->execute();
									$inDeck = $izraz->fetchAll(PDO::FETCH_OBJ);
									foreach ($inDeck as $red): 
									?>
									<tr>
										<td class="naziv" style="width: 35%;"><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
										<td class="mana" style="width: 25%; text-align: center;"><?php echo $red->mana; ?></td>
										<td class="stats" style="width: 30%; text-align: center;"><?php echo $red->stats; ?></td>
										<td class="rarity" style="width: 30%;"><?php echo $red->rarity; ?></td>
										<td class="dodaj" style="width: 40%;">
											
											<a class="dodajKartu" id="dk_<?php echo $red->sifraDeck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-plus-square"></i></a></td>
										<td class="ukloni"><a class="ukloniKartu" id="uk_<?php echo $red->sifraDeck; ?>_<?php echo $red->sifra; ?>" href="#"><i class="fas fa-minus-square"></i></a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					<?php 
					$odabranDeck=$_GET["sifra"];
					$izraz=$veza->prepare("select naziv from deck where sifra=:sifraDeck;");
					$izraz->bindValue("sifraDeck", $odabranDeck, PDO::PARAM_INT);
					$izraz->execute();
					$nazivDeck=$izraz->fetchColumn();
					?>
					
				</div>
				
				<?php if($ukupnoRedova>$brojRezultataPoStranici){?>
										<ul class="pagination text-center" role="navigation" style="position: absolute; left: 350px; margin-top: 10px;">
				  <li class="pagination-previous"><a href="?stranica=<?php echo $stranica - 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>">Previous</a></li>
				 
				  <li><?php echo $stranica ?> / <?php echo $ukupnoStranica; ?></li>
				 
				  <li class="pagination-next"><a href="?stranica=<?php echo $stranica + 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>">Next</a></li>
				</ul>
							<?php		}?>
				<div style="height: 100px; width: 230px; position: relative; left: 318px; border: none;	background: none;">
				<a href="#" style="margin-top: 10px;" data-reveal-id="promjeniNaziv" type="button" class="promjeni" id="rn_<?php echo $_GET["sifra"]; ?>_<?php echo $nazivDeck ?>">Rename</a>
				<a href="#" style="margin-top: 10px; margin-left: 10px;" type="button" class="obrisi" id="dl_<?php echo $_GET["sifra"]; ?>_<?php echo $nazivDeck ?>">Delete</a>
				
				</div>
				<ul class="dropdown menu" data-dropdown-menu style="position: relative; bottom: 95px; left: 125px; text-align: center; width: 150px;">
  
   <li>
    <a class="dropdown menu" style="width: 150px; text-align: center;"  href="#">Select a deck</a>
    <ul class="menu">
    	<?php
    	$izrazDeck=$veza->prepare("select * from deck;");
		$izrazDeck->execute();
		$decks=$izrazDeck->fetchAll(PDO::FETCH_OBJ);
		foreach ($decks as $redDeck):
   	 ?>
      <li><a href="builder.php?sifra=<?php echo $redDeck->sifra; ?>"><?php echo $redDeck->naziv; ?></a></li>
   
    <?php endforeach;  ?>
     </ul>
   </li>
    <?php if(!isset($_GET["sifra"])){
		$izraz=$veza->prepare("select max(sifra) from deck;");
		$izraz->execute();
		$odabranDeck=$izraz->fetchColumn();
	} else{
    $odabranDeck=$_GET["sifra"];
	$izraz=$veza->prepare("select naziv from deck where sifra=:sifraDeck;");
	$izraz->bindValue("sifraDeck", $odabranDeck, PDO::PARAM_INT);
	$izraz->execute();
	$nazivDeck=$izraz->fetchColumn();
	$izraz=$veza->prepare("select karta from karta_deck where deck=:odabranDeck");
	$izraz->bindValue("odabranDeck", $odabranDeck, PDO::PARAM_INT);
	$izraz->execute();
	$karta=$izraz->fetchColumn();
	$izraz=$veza->prepare("select klasa from karta where sifra=:karta");
	$izraz->bindValue("karta", $karta, PDO::PARAM_INT);
	$izraz->execute();
	$klasa=$izraz->fetchColumn();
	}
 	?>
    
	</ul>
			<div id="promjeniNaziv" class="reveal" data-reveal>
						  <p id="naslov"></p>
						  
						  <label for="name">Name</label>
						  <input type="text" name="newName" id="newName"
								placeholder=""
								value="<?php echo $nazivDeck ?>" />
						  <a href="#" class="success button expanded" id="rename">Rename</a>
						  
						 <button class="close-button" data-close aria-label="Close modal" type="button">
						    <span aria-hidden="true">&times;</span>
						 </button>
						  
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
    	var nazivDeck;
    	var dodaj;
    	var ukloni;
    	
    	
    	
    	function definirajDogadaj(){
            
            $("#rename").hide();
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
			  	  + "<td class=\"rarity\">" + rarityKarte + "</td>" + "<td class=\"dodaj\"><a class=\"dodajKartu\" id=\"dk_" + sifraDeck + "_" + sifraKarte + "\" href=\"#\"><i class=\"fas fa-plus-square\"></i></a></td>" + 
			  	  "<td class=\"ukloni\"><a class=\"ukloniKartu\" id=\"uk_" + sifraDeck + "_" + sifraKarte + "\" href=\"#\"><i class=\"fas fa-minus-square\"></i></a></td></tr>");
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
    		
			sifraDeck = $(this).attr("id").split("_")[1];
			sifraKarte = $(this).attr("id").split("_")[2];
    		var stavka = $(this);
    		$.ajax({
			  type: "POST",
			  url: "ukloni.php",
			  data: "sifraKarte=" + sifraKarte + "&sifraDeck=" + sifraDeck,
			  success: function(vratioServer){
			  	stavka.parent().parent().remove();
			  }
			});
    	return false;
    	});
        }
        
        definirajDogadaj();
        
        $(".promjeni").click(function(){
        	sifraDeck = $(this).attr("id").split("_")[1];
        	nazivDeck = $(this).attr("id").split("_")[2];
        	$("#naslov").html("Rename");
        	$.ajax({
			  type: "POST",
			  url: "traziNaziv.php",
			  data: "sifraDeck=" + sifraDeck + "nazivDeck=" + nazivDeck,
			  success: function(vratioServer){
			  	$("#name").html("");
			  	$("#name").append(vratioServer);
			  }
			});
    	$('#promjeniNaziv').foundation('open');
    	$("#newName").change(function(){
    		$("#rename").show();
    	});
    	$("#rename").click(function(){
    		$.ajax({
			  type: "POST",
			  url: "promjeniNaziv.php",
			  data: "newName=" + $("#newName").val() + "&sifraDeck=" + sifraDeck,
			  success: function(vratioServer){
			  	location.reload();
			  }
			});
		$('#promjeniNaziv').foundation('close');
    	});
    	return false;
        });
        
        $(".obrisi").click(function(){
        	sifraDeck = $(this).attr("id").split("_")[1];
        	nazivDeck = $(this).attr("id").split("_")[2];
        	$.ajax({
			  type: "POST",
			  url: "obrisiDeck.php",
			  data: "sifraDeck=" + sifraDeck + "&nazivDeck=" + nazivDeck,
			  success: function(vratioServer){
			  	location.reload();
			  }
			});
        })
        
        // Change the selector if needed
		var $table = $('table.add'),
		    $bodyCells = $table.find('tbody tr:first').children(),
		    colWidth;
		
		// Adjust the width of thead cells when window resizes
		$(window).resize(function() {
		    // Get the tbody columns width array
		    colWidth = $bodyCells.map(function() {
		        return $(this).width();
		    }).get();
		    
		    // Set the width of thead columns
		    $table.find('thead tr').children().each(function(i, v) {
		        $(v).width(colWidth[i]);
		    });    
		}).resize(); // Trigger resize handler
        
    </script>
  </body>
</html>