<?php
session_start();

include("db.php");

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
//$sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";
//echo $sql;

// Execute the query
//$stmt = $conn->query($sql);
$stmt = $conn->prepare("select id from users where email = :email and password = :password");
$stmt->bindParam(":email", $email, PDO::PARAM_STR); //Preventing SQL injection attacks
$stmt->bindParam(":password", $password, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) {
$_SESSION['user_id'] = $rows[0]['id'];
header('location:questions.php');
  }
else {
    echo "Login Failed";
    echo "<a href='loginform.html'>Back to login</a>";
    
}
 
?>