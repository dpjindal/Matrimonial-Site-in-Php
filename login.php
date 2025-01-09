<?php
require_once 'connection/config.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['user_id'] = $user['id'];
	  
      header('Location: display_prof.php');
      
    } else {
      echo "Invalid username or password";
    }
  } 
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login:Sample Matrimony by Jiinfo</title>
</head>

<body>
<?php
require_once 'include/head.php';


?>

<form action="" method="post">
<table align="center">
<tr>
<td colspan="2" align="center"> 
 <h2>Login to the Vivah Sanyog</h2></td> </tr>
<tr>
<td> <label for="username">Username:</label></td>
<td>  <input type="text" id="username" name="username"><br></td> </tr>
 <tr>
<td> <label for="password">Password:</label>
 <td> <input type="password" id="password" name="password"></td></tr>
  <tr>
<td colspan="2" align="center"> <input type="submit" name="login" value="Login" ></td> </tr>
</table>
</form>

</body>
</html>
