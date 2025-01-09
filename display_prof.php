<?php
require_once 'connection/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  
}

	$user_id=$_SESSION['user_id'];
	
$query = "SELECT * FROM users  INNER JOIN profiles ON users.id  = profiles.user_id WHERE profiles.user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$rowcount=mysqli_num_rows($result);


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Profile:Sample Matrimony by Jiinfo</title>
<style>
img {
  width: 200px;
  height: 300px;
  object-fit: contain;
}
</head>

<body >

<?php
require_once 'include/head.php';

require_once 'include/upper_nav.php';
?>
<?php
if(!$rowcount > 0){
	echo "</br> <h3> There is No Data</h3>";
}
else {
?>
<div align="left">

<table width="70%"  >
<tr><td colspan="4" align="center"><h2>Welcome  <?php echo $user['name']; ?></h2></td></tr>
<tr><td colspan="4" align="center"> <h3>User Profile Information:</h3> </td></tr>
<tr><td width="50%"> <b>Name: </b><?php echo $user['name']; ?></td>
<td > <b>Gender: </b><?php echo $user['gender']; ?></td> </tr>
<tr><td><b>User Name:</b> <?php echo $user['username']; ?></td>
<td><b>Email:</b> <?php echo $user['email']; ?></td></tr>
<tr><td><b>Mobile:</b> <?php echo $user['mobile']; ?></td>
<td><b>Height: </b><?php echo $user['height']; ?></td></tr>
<tr><td><b>Weight:</b> <?php echo $user['weight']; ?></td>
<td><b>Education: </b><?php echo $user['education']; ?></td></tr>
<tr><td><b>Occupation:</b> <?php echo $user['occupation']; ?></td>
<td><b>Income:</b> <?php echo $user['income']; ?></td></tr>
<tr><td><b>Family Details: </b><?php echo $user['family_details']; ?></td></tr>
<tr><td colspan="2"><b>Partner Preferences:</b> <?php echo $user['partner_preferences']; ?></td></tr>
<tr><td><b>Profile Photo:</b></style>  </br>  <img src=
"./image/<?php echo $user['profile_picture'];?>" width="200" height="200" > </td></tr> 
<?php
}
?>
<!--<p><a href="edit_user_prof.php">Edit User Data</a>
||

<a href="logout.php">Logout</a></p>  -->
</div>
</body>
</html>
