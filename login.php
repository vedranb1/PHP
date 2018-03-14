<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
</head> 
  <body>
    <div id="page">
		<?php include_once 'include/izbornik.php'; ?>
	<div class="callout">
	<div class="grid-x grid-padding-x">
			<div class="large-12 large-offset-12 cell centered">
				<form class="log-in-form" action="autoriziraj.php" method="post">
				  <h4 class="text-center">Unesite Vaše podatke</h4>
				  <label>Email
				    <input type="email" name="email" placeholder="dlyst@edunova.hr"
				    value="<?php if(isset($_GET["email"])){
				    	echo $_GET["email"];
				    }else{
				    	if($dev){
				    		echo "dlyst@edunova.hr";
				    	}
				    }
					
					
					 ?>">
				  </label>
				  <label>Lozinka
				    <input type="password" name="lozinka" placeholder="Lozinka"
				    value="<?php echo $dev ? "e" : ""; ?>">
				  </label>
				  <p><input type="submit" class="button expanded" value="Prijava"></input></p>
				  <?php if(isset($_GET["neuspjelo"])){
				  	echo "Neispravna kombinacija email/lozinka";
				  } ?>
				</form>

			</div>
		</div>
		</div>
		<?php include_once 'include/podnozje.php'; ?>
	</div>
    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>
