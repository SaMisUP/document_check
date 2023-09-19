<?php
	require('db.php');
	include("auth.php");
	include("header.php");
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex" />
	<title>
	<?php
	if (isset($_SESSION['utilisateur'])){
		$utilisateur = $_SESSION['utilisateur'];
		echo "Bienvenue " . $utilisateur . "";}
	?>	
	sur votre profil </title>
	<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<center>
	<div class="form">
	<p>Bienvenue sur votre profil</p>
	<button><a href="index.php">Accueil</a></button>
	<button><a href="logout.php">Déconnection</a></button>
	<button><a href="recherche.php">Effectuez une recherche</a></button>

	</div>
</center>
	</body>
	</html>