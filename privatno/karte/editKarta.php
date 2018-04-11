<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();
$greska=array();
if(!isset($_GET["sifra"])){
	
	
	if(isset($_POST["sifra"])){
		
		

	if(count($greska)==0){
		
		if($_POST["klasa"]=="Lyonar"){
			$_POST["klasa"]=1;
		}elseif($_POST["klasa"]=="Songhai"){
			$_POST["klasa"]=2;
		}elseif($_POST["klasa"]=="Vetruvian"){
			$_POST["klasa"]=3;
		}elseif($_POST["klasa"]=="Magmar"){
			$_POST["klasa"]=4;
		}elseif($_POST["klasa"]=="Abyssian"){
			$_POST["klasa"]=5;
		}elseif($_POST["klasa"]=="Vanar"){
			$_POST["klasa"]=6;
		}else{
			$_POST["klasa"]=7;
		}
		
		if($_POST["tip"]=="Minion"){
			$_POST["tip"]=1;
		}elseif($_POST["tip"]=="Spell"){
			$_POST["tip"]=2;
		}elseif($_POST["tip"]=="Artifact"){
			$_POST["tip"]=3;
		}else{
			$_POST["tip"]=4;
		}
		
		if($_POST["attack"]==""){
			$_POST["attack"]=null;
		}
		if($_POST["health"]==""){
			$_POST["health"]=null;
		}
		
		$veza->beginTransaction();
		
		$izraz=$veza->prepare("update karta set naziv=:naziv, klasa=:klasa, tip=:tip, mana=:mana, attack=:attack, health=:health,
		rarity=:rarity where sifra=:sifra;");
		$izraz->execute(
			array(
				"sifra" => $_POST["sifra"],
				"naziv" => $_POST["naziv"],
				"klasa" => $_POST["klasa"],
				"tip" => $_POST["tip"],
				"mana" => $_POST["mana"],
				"attack" => $_POST["attack"],
				"health" => $_POST["health"],
				"rarity" => $_POST["rarity"]
				
			)
		);
		
		$veza->commit();
		
		header("location: " . $putanjaAPP . "/privatno/karte/index.php");
	}
	
	}else{
		header("location: " . $putanjaAPP . "logout.php");
	}
	
}else{
	
	$izraz=$veza->prepare("
						select 
							b.naziv as naziv,
							a.naziv as klasa,
							c.naziv as tip,
							b.mana,
							b.attack,
							b.health,
							b.rarity
						from klasa a inner join karta b on a.sifra=b.klasa
						inner join tip c on b.tip=c.sifra
						where b.sifra=:sifra");
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
				  <h4 class="text-center">Karta</h4>
				  
				  <?php 
				  
				  include_once 'input.php'; 
				  inputText("naziv", "", $greska);
				  inputText("klasa", "", $greska);
				  inputText("tip", "", $greska);
				  inputText("mana", "", $greska);
				  inputText("attack", "", $greska);
				  inputText("health", "", $greska);
				  inputText("rarity", "", $greska);
				  ?>
				 
				  <input type="hidden" name="sifra" value="<?php echo $_GET["sifra"]; ?>"></input>
				  <p><input type="submit" class="button expanded" value="Save Changes"></input></p>
				</form>
				
			</div>
		</div>
		
		
      
    </div>

    <?php include_once '../../include/skripte.php'; ?>
    <script>
    <?php if(isset($greska["naziv"])):?>	
    		setTimeout(function(){ $("#naziv").focus(); },1000);	
    <?php elseif(isset($greska["klasa"])):?>	
	    		setTimeout(function(){ $("#klasa").focus(); },1000);	
	<?php elseif(isset($greska["tip"])):?>	
	    		setTimeout(function(){ $("#tip").focus(); },1000);
	<?php elseif(isset($greska["mana"])):?>	
	    		setTimeout(function(){ $("#mana").focus(); },1000);
	<?php elseif(isset($greska["attack"])):?>	
	    		setTimeout(function(){ $("#attack").focus(); },1000);
	<?php elseif(isset($greska["health"])):?>	
	    		setTimeout(function(){ $("#health").focus(); },1000);
	<?php elseif(isset($greska["rarity"])):?>	
	    		setTimeout(function(){ $("#rarity").focus(); },1000);	
	<?php endif; ?>
    </script>
  </body>
</html>
