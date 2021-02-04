<?php
//Da se izbjegne pri editu: "A session had already been started - ignoring session_start()"
if(!isset($_SESSION))
{
  session_start();
}
//Ako user nije logiran, preusmjeri ga na login.php
if(!isset($_SESSION['nickname']))
{
  header("Location: users/login.php");
}
//Spajanje datoteke sa bazom podataka preko poveznica.php
if(!require_once('config/poveznica.php'))
{
  die("Učitavanje filea za konekciju nije uspjelo");
}
//Uključivanje utils.php datoteke
include ('config/utils.php');

//postavljanje varijable $logged_user, zbog različitih profila u kojima će se dodati filmovi
$logged_user = $_SESSION['id'];
//postavljanje querya gdje će logirani korisnik imati listu filmova
$upit_filmovi = "SELECT * FROM filmovi WHERE user_id=$logged_user";
//pozivanje metode query za varijablu $upit_filmovi
$rezultat_filmovi = $conn->query($upit_filmovi);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Lista filmova</title>
</head>
<center>
<body>
<div class="head">
<span>Pozdrav,
<?php
//ispis nicknamea korisnika iznad tablice
 echo 	$_SESSION["nickname"];
 ?>
</span>
<br><a href="users/logout.php">Log out</a>
</div>
<br>
<div class="zanr">
  <a class="zanr" href="zanr/zanr.php">Žanrovi</a>
</div>
<a href=></a>
<h1>Lista filmova</h1>
<table style="center" border="2px">
<tr>
  <th>Naziv Filma</th>
  <th>Godina</th>
  <th>Žanr</th>
  <th>Dodatne opcije</th>
</tr>
<tr>
  <form class="form-control" action="config/obrada.php" method="post">
  <input type="hidden" name ="id">
  <td><input type="text" name="naziv_filma"  value="" placeholder="Unesi ime filma"></td>
  <td><input type="text" name="godina"       value="" placeholder="Unesi godinu"></td>
  <input type="hidden" name ="user_id">
  <td>
  <select class="form-control"  name="zanr" id="zanr">
  <?php
      //Žanr ispis unutar dropdown buttona
      $upit_zanr     = "SELECT * FROM zanr";
      $rezultat_zanr = $conn->query($upit_zanr);
      while($red_zanr = $rezultat_zanr->fetch_assoc()){
        echo "<option value='".$red_zanr['id']."'>".$red_zanr['naziv']."</option>";
      }
   ?>
  </select>
  </td>
  <th>
  <div class="form-group">
  <br><center><button type="submit" name="addMovie">Dodajte film</button></center><br>
  </div>
  </th>
</tr>
<tbody>
    <?php while($red_filmovi = $rezultat_filmovi->fetch_assoc()){ ?>
    <tr>
    <td><label><?= $red_filmovi['naziv_filma']; ?> </label></td>
    <td><label><?= $red_filmovi['godina'];      ?> </label></td>
    <td><label><?= getZanrName($red_filmovi['zanr']); ?> </label></td>
    <td>
    <center>
    <a class="btnDelete" href="config/obrada.php?del=<?php  echo $red_filmovi['id']; ?>"><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/delete-1432400-1211078.png" width="30"></a>
    <a class="btnEdit"   href="edit.php?edit=<?php echo $red_filmovi['id']; ?>"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" width="30">
    </a>
    </center>
    </td>
    </tr>
    <?php } ?>
    <?php
    //UPOZORENJA
    	if(isset($_GET['index'])){
    		if($_GET['index'] == "movie_added"){
    			echo "<p>Film dodan!</p>";
    		}
    		else if($_GET['index'] == "movie_deleted"){
    			echo "<p>Film obrisan!</p>";
    		}
        else if($_GET['index'] == "updated"){
          echo "<p>Film izmjenjen!";
        }
    	}
     ?>
</tbody>
</form>
</table>
</body>
</center>
</html>
