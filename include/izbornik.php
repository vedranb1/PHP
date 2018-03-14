<div id="header">
			<div>
				<a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="navigation">
					<li class="selected">
						<a href="index.php">Home</a>
					</li>
					<li>
					  <!-- <a href="about.php">About</a>   -->
					</li>
					<li class="menu">
						<a href="projects.php">Projects</a>
					</li>
					<li class="menu">
						<a href="blog.php">Browse Cards</a> 
					</li>
					<li>
					<!--	<a href="builder.php">Deck Builder</a>-->
					</li>
					<li>
						<?php if($_SERVER["PHP_SELF"]!==$putanjaAPP . "login.php"): ?>
						  <div class="top-bar-right">
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