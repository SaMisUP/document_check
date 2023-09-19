<?php
	require('db.php');
	//Check if a user is logged in or not
	session_start();
		if (isset($_SESSION['utilisateur'])){
		$utilisateur = $_SESSION['utilisateur'];
		//Display a message for logged-in users only
		echo "<center><h3>Bienvenue " . $utilisateur . "
		!</h3></center>";

		}
		else{
		//Display different text if a user is not logged in.
		echo "<center><h3>Connectez-vous votre inscription</h3></center>";
				echo '<center><div>New user? Please <a href="login.php">Connectez-vous</a> or <a href="register.php">Inscription</a>
				</div></center>';
		}
	?> 
	<html>
	<body>
		<header> 
			<div class="container">
			
		<?php
		//If the user is logged-in
		if (isset($_SESSION['utilisateur'])){
		$utilisateur = $_SESSION['utilisateur'];
		echo '
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Page de navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">
						<span class="glyphicon glyphicon-home"></span> 
						Accueil</a></li>
					<li><a href="dashboard.php"> Mon Profil</a></li>
					<li><a href="logout.php"> Déconnection</a></li>';
	}
		//If the user is logged-out
		else{
		echo '
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Page de navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">
							<span class="glyphicon glyphicon-home"></span> 
							Accueil</a></li>

			<li><a href="login.php"><span class="glyphicon 
					glyphicon-log-in"></span> Connectez-vous</a></li>
					<li><a href="register.php"><span class="glyphicon 
					glyphicon-user"></span> Inscription</a></li>';

		}
		
	?>       
			</div>
		</header>
		<section class="container" >
			<div class="row">
				<div class="col-md-9 content"><br><br><br><br><br><br>
					<center style="margin:auto,width:50%,padding:10px">
						<p class="text-justify">
						Commencez vos pas sur cette plateforme, avec une simple connexion <br>
						puis connectez-vous et facilitez le suivis de vos dossiers.
					    </p>
					</center>
				</div>
			</div>
			
		</section>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<footer class="container">
		   <?php include 'footer.php'; ?>
		</footer>
	  
	</body>
	</html>