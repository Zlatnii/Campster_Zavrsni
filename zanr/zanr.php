<?php
  if(!require_once('../config/poveznica.php'))
  {
    die("Učitavanje filea za konekciju nije uspjelo");
  }
  include ('../config/utils.php');
//Connect with table in database
  $upit_zanr     = "SELECT * FROM zanr";
  $rezultat_zanr = $conn->query($upit_zanr);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Zanr</title>
</head>
<center>
<body>
<div class="">
  <a href="../index.php">Filmovi</a>
</div>
<a href=></a>
<h1>Lista Žanrova</h1>
<table style="center" border="2px">
<tr>
  <th>Naziv Žanra</th>
  <th>Dodatne opcije</th>
</tr>
<tr>
  <form class="form-control" action="zanr_obrada.php" method="post">
  <input type="hidden" name ="id">
  <td><input type="text" name="naziv_zanra"  value=""  placeholder="Unesi naziv žanra"></td>
  <th>
  <div class="form-group">
  <br><center><button type="submit" name="addZanr">Dodajte žanr</button></center><br>
  </div>
  </th>
</tr>
<tbody>
<?php while($red_zanr = $rezultat_zanr->fetch_assoc()){ ?>
<tr>
<td> <label>  <?= $red_zanr['naziv']; ?> </label></td>
<td>
<center>
<a class="btnDelete" href="zanr_obrada.php?del=<?php  echo $red_zanr['id']; ?>"><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/delete-1432400-1211078.png" width="30"></a>
<a class="btnEdit"   href="zanr_edit.php?edit=<?php echo $red_zanr['id']; ?>"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" width="30">
</a>
</center>
</td>
</tr>
<?php } ?>
<?php
  //Obavijesti
  if(isset($_GET['zanr'])){
		if($_GET['zanr'] == "preneseno"){
			echo "<p>Uspješno ste dodali novi žanr!</p>";
		}
		else if($_GET['zanr'] == "izbrisano"){
			echo "<p>Žanr obrisan!</p>";
		}
    else if($_GET['zanr'] == "updated"){
      echo "<p>Žanr uspješno izmjenjen!";
    }
  }
 ?>
</tbody>
</form>
</table>
</body>
</center>
</html>
