<?php
//uključivanje poveznice
include_once '../config/poveznica.php';
//Deklariranje varijabli iz mysql tablice
$zanr_naziv   = isset($_POST['naziv_zanra']) ? $_POST['naziv_zanra'] : '';
//INSERT TABLE
if(isset($_POST['addZanr']))
{
//izrada sql upita
$insert_zanr = "INSERT INTO zanr (id, naziv) VALUES (NULL, '$zanr_naziv')";
//Spajanje upita sa mysql tablicom
mysqli_query($conn, $insert_zanr);
//Ispis unutar URL-a
header("Location: ../zanr/zanr.php?zanr=preneseno");
}
//DELETE TABLE
if (isset($_GET['del']) )
{
//Konvertiranje $_GET['del'] u varijablu
$del = $_GET['del'];
//Spajanje upita sa mysql tablicom
$delete = "DELETE FROM zanr WHERE id=$del";
//funkcija za spajanje upita
mysqli_query($conn, $delete);
//Ispis u url-u
header("Location: ../zanr/zanr.php?zanr=izbrisano");
}
//EDIT TABLE
if(isset($_GET['edit'])){
  $id   = $_GET['edit'];
  $edit = "SELECT * FROM zanr WHERE id='$id'";
  //Spajanje upita sa redom unutar baze
  $rezultat = $conn->query($edit);
  //Prikaz podataka
  $red = $rezultat->fetch_assoc();
}
//UPDATE TABLE
$update_id = isset($_POST['update_id']) ? $_POST['update_id'] : '';
$update_film = isset($_POST['update_naziv_zanra']) ? $_POST['update_naziv_zanra'] : '';
//Postavljanje vrijednosti varijabli prilikom unosa teksta
if(isset($_POST['btnUpdate'])){
  $update_id     = $_POST['update_zanr_id'];
  $update_zanr   = $_POST['update_naziv_zanra'];
  //Spremanje izmjena unutar redova
  $update = "UPDATE zanr SET naziv ='$update_zanr' WHERE id='$update_id' ";
  mysqli_query($conn, $update);
  //Url ispis:
  header("Location: ../zanr/zanr.php?zanr=updated");
}
