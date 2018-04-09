<div id="header">
			<div>
				<a href="index.php" class="logo"><img src="<?php echo $putanjaAPP; ?>images/logo.png" alt=""></a>
				<ul id="navigation">
					<li>
						<a href="<?php echo $putanjaAPP; ?>index.php">Home</a>
					</li>
					<li>
					  <!-- <a href="about.php">About</a>   -->
					</li>
					<li class="menu">
						<a href="<?php echo $putanjaAPP; ?>selection.php">Builder</a>
					</li>
					<li class="menu">
						<a href="<?php echo $putanjaAPP; ?>browse.php">Browse Cards</a> 
					</li>
					<li class="menu">
						<a href="<?php echo $putanjaAPP; ?>builder.php">Edit Decks</a> 
					</li>
					<li>
						<a href="<?php echo $putanjaAPP; ?>era.php">ERA</a>
					</li>
					<li>
						<?php if($_SERVER["PHP_SELF"]!==$putanjaAPP . "login.php"): ?>
						  <div class="top-bar-right" style="position: absolute; right: 1px;">
						    <ul class="menu">
						      <li style="width: 100%;"><?php if(!isset($_SESSION[$appID."autoriziran"])): ?>
							  		<a href="<?php echo $putanjaAPP; ?>login.php" class="button">Prijava</a>
							  	<?php else: ?>
							  		<a href="<?php echo $putanjaAPP; ?>logout.php" class="button">Odjava <?php 
							  		
							  			echo $_SESSION[$appID."autoriziran"]->username;
							  			
							  			?></a>
							  	<?php endif;?></li>
    </ul>
  </div>
  <?php endif;?>
					</li>
				</ul>
			</div>
		</div>