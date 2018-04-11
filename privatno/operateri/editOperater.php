<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();
$greska=array();
if(!isset($_GET["sifra"])){
	
	
	if(isset($_POST["sifra"])){
		
		

	if(count($greska)==0){
		
		$veza->beginTransaction();
		
		$izraz=$veza->prepare("update operater set username=:username, email=:email, 
		uloga=:uloga where sifra=:sifra;");
		$izraz->execute(
			array(
				"username" => $_POST["username"],
				"email" => $_POST["email"],
				"uloga" => $_POST["uloga"],
				"sifra" => $_POST["sifra"]
			)
		);
		
		$veza->commit();
		
		header("location: " . $putanjaAPP . "/privatno/operateri/index.php");
	}
	
	}else{
		header("location: " . $putanjaAPP . "logout.php");
	}
	
}else{
	
	$izraz=$veza->prepare("
						select 
							username,
							email,
							uloga
						from operater 
						where sifra=:sifra");
	$izraz->execute($_GET);
	$_POST=$izraz->fetch(PDO::FETCH_ASSOC);
	
}




?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once '../../include/header.php'; ?>
  </head>
  <body>
    <div class="grid-container">
      	<?php include_once '../../include/izbornik.php'; ?>
      	<a href="index.php"><i style="color: red;" class="fas fa-chevron-circle-left fa-2x"></i></a>
      	<div class="grid-x grid-padding-x" style="width: 100%;">
			<div class="large-4 large-offset-4 cell centered">
				<form class="log-in-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				  <h4 class="text-center">Operater</h4>
				  
				  <?php 
				  
				  include_once 'input.php'; 
				  inputText("username", "Ivan", $greska);
				  inputText("email", "ihorvat@edunova.hr", $greska);
				  inputText("uloga", "operater", $greska);
				  ?>
				 
				  <input type="hidden" name="sifra" value="<?php echo $_GET["sifra"]; ?>"></input>
				  <p><input type="submit" class="button expanded" value="Save Changes"></input></p>
				</form>
				
			</div>
		</div>
		
		
      
    </div>

    <?php include_once '../../include/skripte.php'; ?>
    <script>
    <?php if(isset($greska["username"])):?>	
    		setTimeout(function(){ $("#username").focus(); },1000);	
    <?php elseif(isset($greska["email"])):?>	
	    		setTimeout(function(){ $("#email").focus(); },1000);	
	<?php elseif(isset($greska["uloga"])):?>	
	    		setTimeout(function(){ $("#uloga").focus(); },1000);	
	<?php endif; ?>
    </script>
  </body>
</html>
