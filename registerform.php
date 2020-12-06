<?php
/*
	This script will create a new user in two steps
	1. Check if user email is already registered, if yes, show duplicate email message
	2. Create the new user with provided email and password
*/
include("db.php");

  $first_name = $_REQUEST['first_name'];
  $last_name = $_REQUEST['last_name'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $strResult = '';
  $isValidForm = true;

  if(strlen(trim($email)) == 0){
      $isValidForm = false;
      $strResult .= 'Email is empty<br/>';
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $isValidForm = false;
      $strResult .= 'Email is invalid<br/>';
  }

  if( !preg_match( '/[^A-Za-z0-9]+/', $password) || strlen( $password) < 8){
    $isValidForm = false;
    $strResult .= 'Password is invalid <br/>';
  }

  if($isValidForm){
      echo "Here is your posted data<br/>";
      echo "$email, $password";
  }else
      echo $strResult;
 
$password = md5($password);   //if no encryption comment out
//$sql = "INSERT id FROM users WHERE email = '$email' AND password = '$password'";
//echo $sql;

$stmt = $conn->prepare("select id from users where email = :email"); //Check if email already exists
$stmt->bindParam(":email", $email, PDO::PARAM_STR); //Preventing SQL injection attacks
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) 
    echo "Email already taken";
else {
  $stmt = $conn->prepare("insert into users (first_name, last_name, email, password) values (:first_name, :last_name, :email, :password)"); //Create a new user
  $stmt->bindParam(":first_name", $first_name, PDO::PARAM_STR);
  $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);  
  $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
  $stmt->bindParam(":password", $password, PDO::PARAM_STR);
  $stmt->execute();

  header('location:registered.php');
  }
?>