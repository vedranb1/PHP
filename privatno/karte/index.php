<?php include_once '../../konfiguracija.php'; ?>
<?php $stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
<?php include_once '../../include/header.php'; ?>
</head> 
  <body>
    <div id="page">
		<?php include_once '../../include/izbornik.php'; ?>
	
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
						if($ukupnoRedova>$brojRezultataPoStranici){
							include '../../paginacija.php';
						}
						?>
				
				
	<div id="body">
			<div class="header">
				<div class="tabl">
					
							
							<form method="get">
								<input type="text" name="uvjet" 
								placeholder="uvjet pretraživanja"
								value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
							</form>
						
					<ul>
						<li>
							<div>	
													
									<table class="tablica">
										<thead>
											<tr>
												<th style="width: 10%;">Name</th>
												<th style="width: 10%;">Class</th>
												<th style="width: 5%;">Type</th>
												<th style="width: 5%;">Mana Cost</th>
												<th style="width: 10%;">Attack / Health</th>
												<th style="width: 5%;">Rarity</th>
												<th style="width: 35%;">Akcija</th>
											</tr>
										</thead>
										<tbody>
											
										
									<?php
									foreach ($rezultati as $red):
									?>
											<tr>
												<td class="forcedwidth"><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
												<td><?php echo $red->klasa; ?></td>
												<td><?php echo $red->tip; ?></td>
												<td><?php echo $red->mana; ?></td>
												<td><?php echo $red->stats; ?></td>
												<td><?php echo $red->rarity; ?></td>
												<td>
													<a style="width: 30px; height: 26px;" href="editKarta.php?sifra=<?php echo $red->sifra; ?>"><i class="far fa-edit fa-2x"></i></a>
													<a id="ok_<?php echo $red->sifra; ?>" class="obrisiKartu" style="width: 30px; height: 26px;" href="deleteKarta.php?sifra=<?php echo $red->sifra; ?>"><i class="far fa-trash-alt fa-2x"></i></a> 
												</td>
											</tr>
											
										<?php endforeach; ?>
											
										</tbody>
									</table>
							
									<?php if($ukupnoRedova>$brojRezultataPoStranici){
										include '../../paginacija.php';
									}?>
					
						</div>
					</li>
				</ul>
			</div>
		</div>
		<a class="button" style="margin-top: 20px; margin-left: 650px;" href="<?php echo $putanjaAPP; ?>privatno/karte/novaKarta.php">New Card <i class="fas fa-plus-square"></i></a>
	</div>
</div>

    <?php include_once '../../include/skripte.php'; ?>
    <script>
    	
    	var sifraKarta;
    	
    	$(".obrisiKartu").click(function(){
    		
			sifraKarta = $(this).attr("id").split("_")[1];
    		var stavka = $(this);
    		$.ajax({
			  type: "POST",
			  url: "deleteKarta.php",
			  data: "sifraKarta=" + sifraKarta,
			  success: function(vratioServer){
			  	stavka.parent().parent().remove();
			  }
			});
    	return false;
    	});
    </script>
  </body>
</html>
