<?php 
session_start();
unset($_SESSION["user_id"]); 
unset($_SESSION["user_name"]); 
session_destroy(); 
header("location:index.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logout:Sample Matrimony by Jiinfo</title>
</head>

<body>
</body>
</html>
