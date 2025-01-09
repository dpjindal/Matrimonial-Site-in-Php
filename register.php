<?php
require_once 'connection/config.php';

if (isset($_POST['register'])) {
	$rname = $_POST['rname'];
    $username = $_POST['username'];
       $email = $_POST['email'];
	 $mob = $_POST['mob'];  
	  $pwd = $_POST['pwd'];
	$conf_pwd = $_POST['conf_pwd'];
	
	// $rname = mysqli_real_escape_string($_POST['rname']);
	// $username = mysqli_real_escape_string($_POST['username']);
	
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

  if (!preg_match("/^[a-zA-Z ]*$/", $rname)) {
    $error = "Invalid name format";
  } elseif (!$email) {
    $error = "Invalid email format";
  } 
   if(!$pwd=$conf_pwd){
	   $error="Password and Confirm Password Must be Same";
   }

    $password_hash = password_hash($pwd, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (r_name,username, email, mobile, password) VALUES ('$rname','$username', '$email', '$mob', '$password_hash')";
    mysqli_query($conn, $query);

    header('Location: login.php');
   
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration:Sample Matrimony by Jiinfo</title>
</head>

<body>
<?php
require_once 'include/head.php';
?>
<form action="" method="post" enctype="multipart/form-data">
  <table align="center">
<tr><td colspan="4" align="center" >
<h2>Registration</h2>
</td></tr>
<tr>
<td><label for="rname">Regd_Name:</label> </td>
<td><input type="text" id="rname" name="rname" required="required"></td>
 <td> <label for="username">User_Name:</label>
 <td> <input type="text" id="username" name="username" required="required"></td> </tr>
   
 <tr><td> <label for="email">Email:</label>
<td>  <input type="email" id="email" name="email"></td>
 <td> <label for="mob">Mobile No:</label></td>
 <td> <input type="tel" id="mob" name="mob" required="required"></td></tr>
  <tr>   <td> <label for="pwd">Password:</label></td>
 <td> <input type="password" id="pwd" name="pwd" required="required"></td>
  
   <td> <label for="conf_pwd">Conf.Password:</label></td>
<td>  <input type="password" id="conf_pwd" name="conf_pwd" required="required"></td></tr>

    <tr   align="center"><td colspan="4">   <input type="submit" name="register"   value="Register"></td> </tr>
  </table>
</form>
    
</body>
</html>
