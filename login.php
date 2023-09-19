<?php
	//Start the Session
	session_start();
	 require('db.php');
	//If the form is submitted or not.
	//If the form is submitted
	if (isset($_POST['utilisateur']) and isset($_POST['password'])){
	//Assigning posted values to variables.
	$utilisateur = $_POST['utilisateur'];
	$password = $_POST['password'];
	//Checking the values are existing in the database or not
	$query = "SELECT * FROM utilisateur WHERE utilisateur='$utilisateur' and password='$password'";
	 
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	//If the posted values are equal to the database values, then session will be created for the user.
	if ($count == 1){
	$_SESSION['utilisateur'] = $utilisateur;
	}else{
	//If the login credentials doesn't match, he will be shown with an error message.
	$fmsg = "Invalid Login Credentials.";
	}
	}
	//if the user is logged in Greets the user with message
	if (isset($_SESSION['utilisateur'])){
	$utilisateur = $_SESSION['utilisateur'];
	echo "<center>Bienvenue " . $utilisateur . " Vous êtes connecté.</center>";
	echo "<br><center><button><a href='index.php'> Accueil</a></button><button><a href='dashboard.php'> Mon Profil</a></button><button><a href='logout.php'> Déconnection</a></button></center>";
	 
	}else{
	//When the user visits the page first time, simple login form will be displayed.
	?>
	<html>
	<head>
		<title>User Login Using PHP & MySQL</title>
		<meta name="robots" content="noindex" />
		
	</head>
	<body>

	<div class="container">
		  <form class="form-signin" method="POST">
		  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
			<h2 class="form-signin-heading">Please Login</h2>
			<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" name="utilisateur" class="form-control" placeholder="Utilisateur" required>
		</div>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			<a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
		  </form>
	</div>

	</body>

	</html>
	<?php } ?>