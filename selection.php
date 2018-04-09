<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php include_once 'include/header.php'; ?>
</head>
<body>
	<?php
		$klasa;
		?>
	<div id="page">
		<?php include_once 'include/izbornik.php'; ?>
		<div id="body">
			<div class="header">
				<div class="callout" style="width: 1350px; height: 675px;">
					<h1>SELECT YOUR FACTION GENERAL</h1>
					
							<div style="right: 0px; width: 100%;">
								 <div class="column" style="float: left; width: 16.66%; left: 0px;">
								 	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">LYONAR <br>KINGDOMS</h1>
								 	<img src="images/LyonarCrest.png" id="lnr" alt="" style="position: relative;">
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=1">
								 	<h1 style="float: right; width: 100px; font-size: 12px;">ARGEON <br>HIGHMAYNE</h1>
								 	<img class="argeon" src="images/argcircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=2">
								 	<h1 style="float: left; width: 100px; font-size: 12px;">ZIR'AN <br>SUNFORGE</h1>
								 	<img class="ziran" src="images/zirancircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=3">
								 	<h1 style="float: right; width: 100px; font-size: 12px;">BROME <br>WARCREST</h1>
								 	<img class="brome" src="images/bromecircle.png" alt=""></a>
								 </div>
								  <div class="column" style="float: left; width: 16.66%; left: 1px;">
								  	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">SONGHAI <br>EMPIRE</h1>
								  	<img src="images/SonghaiCrest.png" id="sngh" alt="" style="position: relative;">
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=89">
								  	<h1 style="float: right; width: 120px; font-size: 12px;">KALEOS <br>XAAN</h1>
								  	<img class="kaleos" src="images/kaleoscircle.png" alt=""></a>
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=90">
								  	<h1 style="float: left; width: 120px; font-size: 12px;">REVA <br>EVENTIDE</h1>
								 	<img class="reva" src="images/revacircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=91">
								 	<h1 style="float: right; width: 120px; font-size: 12px;">SHIDAI <br>STORMBLOSSOM</h1>
								 	<img class="shidai" src="images/shidaicircle.png" alt=""></a>
								  </div>
								   <div class="column" style="float: left; width: 16.66%; left: 1px;">
								   	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">VETRUVIAN <br>IMPERIUM</h1>
								   	<img src="images/VetruvianCrest.png" id="vet" alt="" style="position: relative;">
								   	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=177">
								   	<h1 style="float: right; width: 120px; font-size: 12px;">ZIRIX <br>STARSTRIDER</h1>
								   	<img class="zirix" src="images/zirixcircle.png" alt=""></a>
								   	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=178">
								   	<h1 style="float: left; width: 120px; font-size: 12px;">SCIONESS <br>SAJJ</h1>
								 	<img class="sajj" src="images/sajjcircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=179">
								 	<h1 style="float: right; width: 120px; font-size: 12px;">CIPHYRON <br>ASCENDANT</h1>
								 	<img class="ciphyron" src="images/ciphyroncircle.png" alt=""></a>
								   </div>
								  <div class="column" style="float: left; width: 16.66%; left: 1px;">
								  	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">ABYSSIAN <br>HOST</h1>
								  	<img src="images/AbyssianCrest.png" id="abys" alt="" style="position: relative;">
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=353">
								  	<h1 style="float: right; width: 120px; font-size: 12px;">LILITHE <br>BLIGHTCHASER</h1>
								  	<img class="lilithe" src="images/lilithecircle.png" alt=""></a>
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=354">
								  	<h1 style="float: left; width: 120px; font-size: 12px;">CASSYVA <br>SOULREAPER</h1>
								 	<img class="cassyva" src="images/cassyvacircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=355">
								 	<h1 style="float: right; width: 120px; font-size: 12px;">MAEHV <br>SKINSOLDER</h1>
								 	<img class="maehv" src="images/maehvcircle.png" alt=""></a>
								  </div>
								   <div class="column" style="float: left; width: 16.66%; left: 1px;">
								   	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">MAGMAR <br>ASPECTS</h1>
								   	<img src="images/MagmarCrest.png" id="mag" alt="" style="position: relative;">
								   	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=265">
								   	<h1 style="float: right; width: 120px; font-size: 12px;">VAATH THE<br>IMMORTAL</h1>
								   	<img class="vaath" src="images/vaathcircle.png" alt=""></a>
								   	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=266">
								   	<h1 style="float: left; width: 120px; font-size: 12px;">STARHORN <br>THE SEEKER</h1>
								 	<img class="starhorn" src="images/starhorncircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=267">
								 	<h1 style="float: right; width: 140px; font-size: 12px;">RAGNORA<br> THE RELENTLESS</h1>
								 	<img class="ragnora" src="images/ragnoracircle.png" alt=""></a>
								   </div>
								  <div class="column" style="float: left; width: 16.66%; left: 1px;">
								  	<h1 style="float: left; font-size: 25px; position: relative; right: 350px;">VANAR <br>KINDRED</h1>
								  	<img src="images/VanarCrest.png" id="vnr" alt="" style="position: relative;">
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=441">
								  	<h1 style="float: right; width: 100px; font-size: 12px;">FAIE <br>BLOODWING</h1>
								  	<img class="faie" src="images/faiecircle.png" alt=""></a>
								  	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=442">
								  	<h1 style="float: left; width: 100px; font-size: 12px;">KARA <br>WINTERBLADE</h1>
								 	<img class="kara" src="images/karacircle.png" alt=""></a>
								 	<a class="selectGeneral" id="sg_89_2" href="builder.php?general=443">
								 	<h1 style="float: right; width: 100px; font-size: 12px;">ILENA <br>CRYOBYTE</h1>
								 	<img class="ilena" src="images/ilenacircle.png" alt=""></a>
								  </div>
					
							</div>
						
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="connect">
				<div>
					<h1>FOLLOW OUR  MISSIONS ON</h1>
					<div>
						<a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">facebook</a>
						<a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">twitter</a>
						<a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus">googleplus</a>
						<a href="http://pinterest.com/fwtemplates/" class="pinterest">pinterest</a>
					</div>
				</div>
			</div>
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY SPACE PROSPECTION | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div>
	</div>
	 <?php include_once 'include/skripte.php'; ?>
	 <script>
	 	var sifraKarte;
	 	var sifraKlasa;
	 	
	 	function selectGeneral(){
	 	
	 		$(".selectGeneral").click(function(){
	 			sifraGeneral = $(this).attr("id").split("_")[1];
				sifraKlase = $(this).attr("id").split("_")[2];
				$.ajax({
			  type: "POST",
			  url: "builder.php",
			  data: "sifraGeneral=" + sifraGeneral + "&sifraKlase=" + sifraKlase,
			  success: function(vratioServer){
			  	
			  }
			});
    	return false;
	 		})
	 		
	 	}
	 </script>
</body>
</html>