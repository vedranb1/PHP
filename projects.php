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
				<div class="callout">
					<h1>SELECT YOUR FACTION</h1>
					<ul>
						<li>
							<div>
								<a class="thumb" href="#"><img src="images/LyonarCrest.png" id="lnr" alt="" align="left"><span class="thumbf">
								<span id="first"><img class="argeon" src="images/argeonn.png" alt=""></span><span id="firstf">
								</span><span id="second"><img class="ziran" src="images/zirann.png" alt="">
								</span></span><span id="third"><img class="brome" src="images/bromee.png" alt=""></span><span id="thirdf"></span></a>
								<a class="thumb" href="#"><img src="images/SonghaiCrest.png" id="sngh" alt="" align="left"><span id="first1">
								<img class="kaleos" src="images/kaleoss.png" alt=""><a class="generalkal" id="og_89_2" href="builder.php">Kaleos</a></span><span id="second1">
								<img class="reva" src="images/revaa.png" alt=""></span><a class="generalrev" id="og_90_2" href="builder.php">Reva</a>
								<span id="third1"><img class="shidai" src="images/shidaii.png" alt=""><a class="generalshi" id="og_91_2" href="builder.php">Shidai</a></span></a>
								<a class="thumb" href="#"><img src="images/AbyssianCrest.png" id="abys" alt="" align="left"><span id="first2">
								<img class="lilithe" src="images/lilithee.png" alt=""><a class="generallil" id="og_353_5" href="builder.php">Lilithe</a></span><span id="second2">
								<img class="cassyva" src="images/cassyvaa.png" alt=""><a class="generalcas" id="og_354_5" href="builder.php">Cassyva</a></span>
								<span id="third2"><img class="maehv" src="images/maehvv.png" alt=""><a class="generalmae" id="og_355_5" href="builder.php">Maehv</a></span></a>
								<a class="generalarg" id="og_1_1" href="builder.php">Argeon</a><a class="generalzir" id="og_2_1" href="builder.php">Zir'An</a><a class="generalbro" id="og_3_1" href="builder.php">Brome</a>
								<a class="thumb" href="#"><img src="images/VetruvianCrest.png" id="vet" alt="" align="left"><span id="first3">
								<img class="zirix" src="images/zirixx.png" alt=""><a class="generalzirix" id="og_177_3" href="builder.php">Zirix</a></span><span id="second3">
								<img class="sajj" src="images/sajjj.png" alt=""><a class="generalsaj" id="og_178_3" href="builder.php">Sajj</a></span>
								<span id="third3"><img class="ciphyron" src="images/ciphyronnn.png" alt=""><a class="generalcip" id="og_179_3" href="builder.php">Ciphyron</a></span></a>
								<a class="thumb" href="#"><img src="images/MagmarCrest.png" id="mag" alt="" align="left"><span id="first4">
								<img class="vaath" src="images/vaathh.png" alt=""><a class="generalvat" id="og_265_4" href="builder.php">Vaath</a></span><span id="second4">
								<img class="starhorn" src="images/starhornn.png" alt=""><a class="generalstar" id="og_266_4" href="builder.php">Starhorn</a></span>
								<span id="third4"><img class="ragnora" src="images/ragnora.png" alt=""><a class="generalrag" id="og_267_4" href="builder.php">Ragnora</a></span></a>
								<a class="thumb" href="#"><img src="images/VanarCrest.png" id="vnr" alt="" align="left"><span id="first5">
								<img class="faie" src="images/faiee.png" alt=""><a class="generalfaie" id="og_441_6" href="builder.php">Faie</a></span><span id="second5">
								<img class="kara" src="images/karaa.png" alt=""><a class="generalkara" id="og_442_6" href="builder.php">Kara</a></span>
								<span id="third5"><img class="ilena" src="images/ilenaa.png" alt=""><a class="generalile" id="og_443_6" href="builder.php">Ilena</a></span></a>		
							</div>
						</li>
					</ul>
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
	 $(".ziran").hide();
	 $(".brome").hide();
	 	$("#lnr").hover(function(){
	 		$(".ziran").show();
	 		$(".brome").show();
	 	})
	 </script>
</body>
</html>