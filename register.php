<?php
	require('db.php');
		// If the values are posted, insert them into the database.
		if (isset($_POST['utilisateur']) && isset($_POST['password'])){
			$utilisateur = $_POST['utilisateur'];
			$email = $_POST['email'];
			$password = $_POST['password'];
	 
	 $sql = "INSERT INTO utilisateur (utilisateur, password, email)
	VALUES ('$utilisateur', '$password', '$email')";

	if (mysqli_query($conn, $sql)) {
		echo "<center><h3>New record created successfully!<br/>Click here to <a href='login.php'>Login</a></h3></center>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);       
			
		}
    
		?>
	<html>
	<head>
		<?php include 'header.php'; ?>
		<meta name="robots" content="noindex" />
	</head>
	<body>

	<div class="container">
		  <form class="form-signin" method="POST">
		  
		  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		  	<a href="login.php">Retour</a>
			<h2 class="form-signin-heading">Register</h2>
			<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" name="utilisateur" class="form-control" placeholder="Username" required>
		</div>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox">
			  <label>
				<input type="checkbox" value="remember-me"> Remember me
			  </label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button> 
		  </form>
	</div>

	</body>

	</html>