<?php
include('zanr.php');
if(!require_once('zanr_obrada.php'))
{
  die("Učitavanje filea za konekciju nije uspjelo");
}

?>
<center>
<h1>Uredi žanrove</h1>
<table style="center" border="2px">
  <tr>
    <th>Naziv Žanra</th>
    <th>Dodatne opcije</th>
  </tr>
<tr>
  <form class="form-control" action="zanr_obrada.php" method="post">
  <input type="hidden" name="update_zanr_id" value="<?php echo $red['id'];?>">
  <td><input type="text" name="update_naziv_zanra"  value="<?php echo $red['naziv'];?>"  placeholder="Uredi ime žanra"></td>
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
