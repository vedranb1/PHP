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
										
							select count(*) from operater 
							where concat(username, email, lozinka, uloga) like :uvjet
										
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
						$izraz = $veza->prepare("select * from operater 
						where concat(username, email, lozinka, uloga) like :uvjet
						order by uloga, username limit :stranica, :brojRezultataPoStranici
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
											<tr>
												<th>Uloga</th>
												<th>Username</th>
												<th>Email</th>
												<th>Akcija</th>
											</tr>
										</thead>
										<tbody>
											
										
									<?php
									foreach ($rezultati as $red):
									?>
											<tr>
												<td style="width: 10%;"><?php echo $red->uloga; ?></td>
												<td style="width: 15%;"><?php echo $red->username; ?></td>
												<td style="width: 15%;"><?php echo $red->email; ?></td>
												<td style="width: 35%;">
													<a style="width: 30px; height: 26px;" href="editOperater.php?sifra=<?php echo $red->sifra; ?>"><i class="far fa-edit fa-2x"></i></a>
													<a id="oo_<?php echo $red->sifra; ?>" class="obrisiOperatera" style="width: 30px; height: 26px;" href="deleteOperater.php?sifra=<?php echo $red->sifra; ?>"><i class="far fa-trash-alt fa-2x"></i></a>  
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
		
	</div>
</div>

    <?php include_once '../../include/skripte.php'; ?>
    <script>
    	
    	var sifraOperater;
    	
    	$(".obrisiOperatera").click(function(){
    		
			sifraOperater = $(this).attr("id").split("_")[1];
    		var stavka = $(this);
    		$.ajax({
			  type: "POST",
			  url: "deleteOperater.php",
			  data: "sifraOperater=" + sifraOperater,
			  success: function(vratioServer){
			  	stavka.parent().parent().remove();
			  }
			});
    	return false;
    	});
    </script>
  </body>
</html>
