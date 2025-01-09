<?php
require_once 'connection/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Matrimony by Jiinfo</title>
</head>

<body >
<div align="center">
<?php
require_once 'include/head.php';
?>
<h1>Welcome, <?php echo $user['r_name']; ?></h1>

<H3>User Profile Information:</h3>

<p>Name: <?php echo $user['r_name']; ?></p>
<p>User Name: <?php echo $user['username']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
<p>Phone Number: <?php echo $user['mobile']; ?></p>
<!--<p>Education: <?php //echo $user['education']; ?></p>
<p>Occupation: <?php //echo $user['occupation']; ?></p>
<p>Income: <?php //echo $user['income']; ?></p>
<p>Family Details: <?php //echo $user['family_details']; ?></p>
<p>Partner Preference: <?php //echo $user['partner_preference']; ?></p>-->

<!--<p><a href="edit_user_prof.php">Edit User Data</a>
||

<a href="logout.php">Logout</a></p>-->
</div>
</body>
</html>