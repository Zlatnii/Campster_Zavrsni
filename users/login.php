<?php
  session_start();
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<center>
<div class="">
  <a href="registracija.php">Registriraj se</a>
</div>
</center>
<body>
<center>
<div class="col-lg-4" style="margin: 0 auto;margin-top: 50px">
<h1>Log In</h1>
<form method="post" action="login.inc.php">
<div class="form-group">
   <label for="email">Email:</label>
   <input type="text" name="email" placeholder="Email...">
</div>
<div class="form-group">
   <label for="password">Password:</label>
   <input name="password" type="password" placeholder="Password...">
</div>
<button type="submit" name="btnSubmit">Prijavi se</button>
<?php
//UPOZORENJA
	if(isset($_GET['error'])){
		if($_GET['error'] == "emptyinput"){
			echo "<p>Ispunite polja!</p>";
		}
		else if($_GET['error'] == "wronglogin"){
			echo "<p>Netočni podaci o logiranju!</p>";
		}
    else if($_GET['error'] == "notexist"){
      echo "<p>Korisnik sa navedenim emailom ne postoji!";
    }
	}
 ?>
</form>
</div>
</center>
</body>
</html>
