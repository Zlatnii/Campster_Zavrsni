<?php
include 'poveznica.php';
//Funkcija pri ispisu imena žanra, a koristit će se u indexu
function getZanrName($id){
global $conn;
  $upit     = "SELECT naziv FROM zanr WHERE id=$id";
  $rezultat = $conn->query($upit);

  return $rezultat->fetch_row()[0];
}
?>
