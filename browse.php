<?php include_once 'konfiguracija.php'; ?>
<?php $stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1; ?>
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
						$izraz = $veza->prepare("select b.naziv, c.naziv as klasa, a.naziv as tip, b.mana, concat_ws(' / ', b.attack, b.health) as stats, b.rarity
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
							include 'paginacija.php';
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
											<tr class="row">
												<th class="tname">Name</th>
												<th class="tclass">Class</th>
												<th class="ttype">Type</th>
												<th class="tmana">Mana Cost</th>
												<th class="tah">Attack / Health</th>
												<th class="trarity">Rarity</th>
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
											</tr>
											
										<?php endforeach; ?>
											
										</tbody>
									</table>
							
									<?php if($ukupnoRedova>$brojRezultataPoStranici){
										include 'paginacija.php';
									}?>
					
						</div>
					</li>
				</ul>
			</div>
		</div>
		
	</div>
</div>

    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>
