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
										<th><i class="fas fa-minus-square"></i></th>
									</tr>
								</thead>
								<tbody>
											
										
									<?php
									foreach ($rezultati as $red):
									?>
											<tr>
												<td class="forcedwidth"><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
												<td><?php echo $red->mana; ?></td>
												<td><?php echo $red->stats; ?></td>
												<td><?php echo $red->rarity; ?></td>
												<th><a href="dodaj.php?sifra=<?php echo $red->sifra; ?>"><i class="fas fa-plus-square"></i></a></th>
												<th><a href="ukloni.php?sifra=<?php echo $red->sifra; ?>"><i class="fas fa-minus-square"></i></a></th>
											</tr>
											
										<?php endforeach; ?>
											
										</tbody>
							</table>
							<table class="add" style="width: 50%; float:left;">
								<thead>
									<tr>
										<th>Name</th>
										<th>Mana Cost</th>
										<th>Attack / Health</th>
										<th>Rarity</th>
										<th><i class="fas fa-plus-square"></i></th>
										<th><i class="fas fa-minus-square"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$izraz = $veza->prepare("select c.sifra, c.naziv, c.mana, concat_ws(' / ', c.attack, c.health) as stats, c.rarity
									from deck a inner join karta_deck b on a.sifra=b.deck
									inner join karta c on b.karta=c.sifra
									where a.sifra=1;
									");
									$izraz->execute();
									$inDeck = $izraz->fetchAll(PDO::FETCH_OBJ);
									foreach ($inDeck as $red): 
									?>
									<tr>
										<td><?php echo mb_strimwidth($red->naziv, 0, 30, "..."); ?></td>
										<td><?php echo $red->mana; ?></td>
										<td><?php echo $red->stats; ?></td>
										<td><?php echo $red->rarity; ?></td>
										<th><a href="dodaj.php?sifra=<?php echo $red->sifra; ?>"><i class="fas fa-plus-square"></i></a></th>
										<th><a href="ukloni.php?sifra=<?php echo $red->sifra; ?>"><i class="fas fa-minus-square"></i></a></th>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					
				</div>
			</div>
	</div>
    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>
