<?php

  include_once '../config/poveznica.php';
  include_once 'functions.inc.php';
  
if(isset($_POST['btnSubmit']))
{
  $nickname      = $_POST['nickname'];
  $email         = $_POST['email'];
  $password      = $_POST['password'];
  $con_password  = $_POST['con_password'];


  if(emptyInputSignup($nickname, $email, $password, $con_password) !== false){
		header("Location: ../signup/registracija.php?error=emptyinput");
		exit();
  }
  if(invalidNick($nickname) !== false){
		header("Location: ../signup/registracija.php?error=invalidNickname");
		exit();
  }
  if(invalidEmail($email) !== false){
		header("Location: ../signup/registracija.php?error=invalidEmail");
		exit();
  }
  if(passwordMatch($password, $con_password) !== false){
		header("Location: ../signup/registracija.php?error=passwordsdontmatch");
		exit();
  }
  if(nickExist($conn, $username, $email) !== false){
		header("Location: ../signup/registracija.php?error=nicknameTaken");
		exit();
  }

  createUser($conn, $nickname, $email, $password);

} else {
    header("Location: ../index.php");
  }
 ?>
