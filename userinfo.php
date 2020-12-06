<?php
//this is required when using sessions as the first line!
include("db.php");

$user_id = $_SESSION['user_id'];

// Execute the query
$stmt = $conn->prepare("select first_name, last_name from users where id = :id");
$stmt->bindParam(":id", $user_id, PDO::PARAM_INT); //Preventing SQL injection attacks

$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php 
	$name = $user['first_name'];

	if(isset($user['last_name']))
		$name = $name . ', ' . $user['last_name'];
?>

Hi <?php echo $name; ?>

<a href='logout.php'>Logout</a>