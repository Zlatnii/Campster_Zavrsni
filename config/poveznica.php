<?php
$server   = "localhost";
$username = "root";
$password = "";
$database  = "campster_zadatak";
// Kreiranje poveznice sa serverom
$conn = new mysqli($server, $username, $password, $database);
// Postavljanje collation-a - uspoređivanje
mysqli_set_charset($conn, 'utf8');
// Provjera konekcije
if($conn->connect_error)
{
  die("Konekcija nije uspjela: " . $conn->connect_error);
}
?>
