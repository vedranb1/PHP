<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
<?php include_once 'include/header.php'; ?>
</head> 
  <body>
    <div id="page">
		<?php include_once 'include/izbornik.php'; ?>
	<div id="body" class="home">
		<div class="header">
			<div class="index" style="position: absolute; height: 250px; max-width: 2000px;">
				<h1 style="margin-left: 50px;">Welcome to Decklyst</h1>
						<p style="margin-left: 50px;">
							Decklyst is a site where you can build your own decks using cards from Duelyst card collection.
							Click the 'Browse Cards' tab in the navigation bar to see all the cards available to you or start
							building immediately by clicking the button below.
						</p>
			</div>
		
			</div>
			<a href="selection.php" class="button" style="position: relative; top: 250px; margin-left: 650px; margin-top: 30px;">Start Building</a>
		</div>
		<?php include_once 'include/podnozje.php'; ?>
	</div>
    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>
