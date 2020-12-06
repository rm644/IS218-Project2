<?php
include('session.php');
?>

<!DOCTYPE html>

<html>
    
<head>
    <title>Questions</title>
    <!-- Link to CSS file-->
    <link type="text/css" rel="stylesheet" href="loginform.css"/> 
</head>

<body>

<?php
include('userinfo.php');
?>
<hr/>
<a href = "addquestion.php" >Add Questions: </a>
<br/> <br/>
<?php

$sql = "SELECT id, name, body, skills FROM questions";

// Execute the query
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) {
    echo "We found " . count($rows) . " questions<br/>";
?>

    <table style="width: 500px; text-align: left; border: solid 1px #ccc">
        <thead>
            <th>Id</th>
            <th>Name </th>
            <th>Body </th>
            <th>Skills </th>
        </thead>
        <tbody>

            <?php
  // output data of each row
  foreach($rows as $row) {
?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["body"];?></td>
                <td><?php echo $row["skills"];?></td>
            </tr>

            <?php  
  }

  echo "</tbody>";
  echo "</table>";

} else {
  echo "0 results";
}

//$conn->close();
?>

</body>
</html>