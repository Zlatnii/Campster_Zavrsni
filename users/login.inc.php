<?php
include_once '../config/poveznica.php';
include_once 'functions.inc.php';

if(isset($_POST['btnSubmit'])){

$email    = $_POST['email'];
$password = $_POST['password'];

if(emptyInputLogin($email, $password) !== false){
	header("Location: login.php?error=emptyinput");
	exit();
}

 loginUser($conn, $email, $password);
}
else{
	header("Location: login.php");
	exit();
}

?>
