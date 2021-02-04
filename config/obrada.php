<?php
session_start();
//uključivanje poveznice
include_once 'poveznica.php';
//Deklariranje varijabli iz mysql tablice
$id     = isset($_POST['id']) ? $_POST['id'] : '';
$film   = isset($_POST['naziv_filma']) ? $_POST['naziv_filma'] : '';
$godina = isset($_POST['godina']) ? $_POST['godina'] : '';
$zanr   = isset($_POST['zanr']) ? $_POST['zanr'] : '';
$user_id = $_SESSION['id']; //koristiti ga poslije
//INSERT TABLE
if(isset($_POST['addMovie']))
{
//izrada sql upita
echo $insert = "INSERT INTO filmovi (id, naziv_filma, godina, zanr, user_id) VALUES (NULL,'$film', $godina, $zanr, $user_id)";
//Spajanje upita sa mysql tablicom
mysqli_query($conn, $insert);
//Ispis unutar URL-a
header("Location: ../index.php?index=movie_added");
}
//DELETE TABLE
if (isset($_GET['del']) )
{
//Konvertiranje $_GET['del'] u varijablu
$del = $_GET['del'];
//Spajanje upita sa mysql tablicom
$delete = "DELETE FROM filmovi WHERE id=$del";
//funkcija za spajanje upita
mysqli_query($conn, $delete);
//Ispis u url-u
header("Location: ../index.php?index=movie_deleted");
}
//EDIT TABLE
if(isset($_GET['edit'])){
  $id   = $_GET['edit'];
  $edit = "SELECT * FROM filmovi WHERE id=$id";
  //Spajanje upita sa redom unutar baze
  $rezultat = $conn->query($edit);
  //Prikaz podataka
  $red = $rezultat->fetch_assoc();
}
//UPDATE TABLE
$update_id = isset($_POST['update_id']) ? $_POST['update_id'] : '';
$update_film = isset($_POST['update_naziv_filma']) ? $_POST['update_naziv_filma'] : '';
$update_godina = isset($_POST['update_godina']) ? $_POST['update_godina'] : '';
$update_zanr = isset($_POST['update_zanr']) ? $_POST['update_zanr'] : '';
$update_user_id = 1; //User id se uzima is sessiona kasnije
//Postavljanje vrijednosti varijabli prilikom unosa podataka
if(isset($_POST['btnUpdate'])){
  $update_id     = $_POST['update_id'];
  $update_film   = $_POST['update_naziv_filma'];
  $update_godina = $_POST['update_godina'];
  $update_zanr   = $_POST['update_zanr'];
  //Spremanje izmjena unutar redova
  $update = "UPDATE filmovi SET naziv_filma ='$update_film', godina='$update_godina', zanr='$update_zanr' WHERE id=$update_id ";
  mysqli_query($conn, $update);
  //Url ispis:
  header("Location: ../index.php?index=updated");
}
