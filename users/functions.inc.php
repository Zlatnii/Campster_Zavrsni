<?php
//Provjera upisa unutar inputa (da li je prazan).
function emptyInputSignup($nickname, $email, $password, $con_password){
 $result;
if(empty($nickname) || empty($email) || empty($password) || empty($con_password)){
	$result = true;
}
else
{
	$result = false;
}
return $result;
}

//Provjera valjanosti nicknamea.
function invalidNick($nickname){
$result;
if(!preg_match("/^[a-zA-Z0-9]*$/", $nickname)){
	$result = true;
}
else
{
	$result = false;
}
return $result;
}

//Projera ispravnosti emaila, sa ugrađenom funkcijom FILTER_VALIDATE_EMAIL, koja provjeri u bazi podataka da li je mail valjan, ako je, vrijednost je true.
function invalidEmail($email){
$result;
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$result = true;
}
else
{
	$result = false;
}
return $result;
}
//Provjerava da li lozinka i potvrda lozinke odgovaraju.
function passwordMatch($password, $con_password){
$result;

if($password !== $con_password){
	$result = true;
}
else
{
	$result = false;
}
return $result;
}
//Da li je nickname korišten
function nickExist($conn, $nickname, $email){
$sql = "SELECT * FROM users WHERE nickname = ? OR email = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
  header("Location: ../registracija.php?error=stmtfailed");
	exit();
}
//"ss" dva stringa unutar $sql upita te ima dva upitnika
mysqli_stmt_bind_param($stmt, "ss", $nickname, $email);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
	//Zatvaranje stmt uvjeta
  mysqli_stmt_close($stmt);
}

function createUser($conn, $nickname, $email, $password){
	$sql = "INSERT INTO users (nickname, email, password) VALUES (?, ?, ?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
	header("Location: ../registracija.php?error=stmtfailed");
	exit();
}
$hashedPassword = md5($password);

mysqli_stmt_bind_param($stmt, "sss", $nickname, $email, $hashedPassword);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: ../index.php?Dobrodošao/$nickname");
exit();
}

//Login obrada
function emptyInputLogin($email, $password){
$result;

if(empty($email) || empty($password)){
	$result = true;
}
else
{
	$result = false;
}
return $result;
}
//Login user funkcija
function loginUser($conn, $email, $password){
$hashedPassword = md5($password);
$upit_user = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword';";
$rezultat_user = $conn->query($upit_user);
$num_rows = mysqli_num_rows($rezultat_user);
if($num_rows===0){
  header("Location: login.php?error=notexist");
  exit();
}else{
	session_start();
	$userdata = $rezultat_user->fetch_assoc();
	$_SESSION["nickname"] = $userdata["nickname"];
	$_SESSION["id"] = $userdata["id"];
	header("Location: ../index.php");
	exit();
}
}
?>
