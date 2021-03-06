<?php
include("session.php");
include("db.php");

  $questionName = $_REQUEST['name'];
  $questionBody = $_REQUEST['body'];
  $questionSkills = $_REQUEST['skills'];

  $strResult = '';
  $isValidForm = true;

  if(strlen($questionName) == 0){
      $isValidForm = false;
      $strResult .= 'Question Name is empty<br/>';
  }
  else if(strlen($questionName) < 3) {
    $isValidForm = false;
    $strResult .= 'Question Name is too short<br/>';

  }
  else if(strlen($questionName) > 500) {
    $isValidForm = false;
    $strResult .= 'Question Name is too long<br/>';

    
  }
  
  if(strlen($questionBody) == 0){
      $isValidForm = false;
      $strResult .= 'Question Body is empty<br/>';
  }

  else if(strlen($questionBody > 500)) {
    $isValidForm = false;
    $strResult .= 'Question Body is too long<br/>';
  }
  

  if($isValidForm){
      echo "Here is your posted data<br/>";
      echo "$questionName<br>";
      echo "$questionBody<br>";
      $arSkills = explode (", ", $questionSkills);
      print_r($arSkills);

      $user_id = $_SESSION['user_id'];
      $stmt = $conn->prepare("insert into questions (user_id, name, body, skills) values ( :user_id, :name, :body, :skills)");
      $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT); //Preventing SQL injection attacks
      $stmt->bindParam(":name", $questionName, PDO::PARAM_STR);
      $stmt->bindParam(":body", $questionBody, PDO::PARAM_STR);
      $stmt->bindParam(":skills", $questionSkills, PDO::PARAM_STR);
        $stmt->execute();

        echo "<a href='questions.php'>Show Questions</a>";
  }else
      echo $strResult;
   
?>