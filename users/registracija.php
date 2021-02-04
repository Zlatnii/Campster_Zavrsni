<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
<center>
<div class="">
<br><a href="login.php">Log in</a>
</div>
</center>
<center>
<div class="col-lg-4" style="margin: 0 auto;margin-top: 50px">
<h1>Registracija</h1>
<form method="post" action="registracija.inc.php">
   <div class="form-group">
       <label for="nickanme">Nickname:</label>
       <input type="nickname" name="nickname" placeholder="Upišite vaš nickname">
   </div>
   <div class="form-group">
       <label for="email">Email:</label>
       <input type="email" name="email" placeholder="Upišite vaš email">
   </div>
   <div class="form-group">
       <label for="password">Password:</label>
       <input type="password" name="password"   placeholder="Password">
   </div>
   <div class="form-group">
       <label for="password">Confirm Password:</label>
       <input type="password" name="con_password" placeholder="Confirm Password">
   </div>
   <button type="submit" name="btnSubmit">Registriraj se</button>
   <?php
   //Upozorenja
    if(isset($_GET['error'])){
      if($_GET['error'] == "emptyinput"){
        echo "<p>Ispunite sva polja!</p>";
      }
      else if($_GET['error'] == "invalidNickname"){
        echo "<p>Koristite ispravan nickname!</p>";
      }
      else if($_GET['error'] == "invalidEmail"){
        echo "<p>Koristite ispravan email!</p>";
      }
      else if($_GET['error'] == "passwordsdontmatch"){
        echo "<p>Lozinke se ne podudaraju!</p>";
      }
      else if($_GET['error'] == "stmtfailed"){
        echo "<p>Nešto je pošlo po krivu, pokušajte ponovo!</p>!";
      }
      else if($_GET['error'] == "nicknameTaken"){
        echo "<p>Nickname je već korišten!</p>";
      }
      else if($_GET['error'] == "none"){
        echo "<p>Već ste prijavljeni!</p>";
      }
    }
    ?>
</form>
</div>
</center>
</body>
</html>
