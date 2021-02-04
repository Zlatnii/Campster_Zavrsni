<?php
if(!require_once('config/obrada.php'))
{
  die("Učitavanje filea za konekciju nije uspjelo");
}
include('index.php');
?>
<center>
<h1>Uredi tablicu</h1>
<table style="center" border="2px">
<tr>
  <th>Naziv Filma</th>
  <th>Godina</th>
  <th>Žanr</th>
  <th>Dodatne opcije</th>
</tr>
<tr>
  <form class="form-control" action="config/obrada.php" method="post">
  <input type="hidden" name="update_id"             value="<?php echo $red['id'];?>">
  <td><input type="text" name="update_naziv_filma"  value="<?php echo $red['naziv_filma'];?>"  placeholder="Unesi ime filma"></td>
  <td><input type="text" name="update_godina"       value="<?php echo $red['godina'];?>"       placeholder="Unesi godinu"></td>
  <td>
  <select class="form-control"  name="update_zanr"  id="zanr">
    <?php
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
  <center>
    <button type="submit" name="btnUpdate"><img src="https://cdn1.iconfinder.com/data/icons/ios-11-glyphs/30/save-512.png" width="30"></button>
  <center>
  </div>
  </th>
  </form>
</tr>
</table>
</center>
