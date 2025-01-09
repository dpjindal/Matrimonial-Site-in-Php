<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample Matrimony by Jiinfo</title>
<style type="text/css">
.green {
	color: #0F0;
}
.pink {
	color: #FF0080;
}
.kesaria {
	color: #FF8000;
}
</style>
</head>

<body>


<table align="center" cellpadding="2" cellspacing="2" >
    <tr>
<td width="10%" rowspan="2"><img src="image/matrimony.jpg" width="128" height="128" alt="logo" /></td>
      <td width ="15%" rowspan="2" align="center" valign="middle" font color="green"><h2 class="bottlegreen" ><span class="kesaria">Matrimony</span></h2></td>
   <?php
  if (!isset($_SESSION['user_id'])) {
	?>	
<td width="30%">

<h3 align="center"><span class="green"><a href="login.php">Login</a></a></span></h3></td>
     <?php     
		  }
    else 
    { 
	?>
     <td width="20%" valign="middle"><h3>
       <span class="pink"><a href="logout.php">Logout</a>
      </span></h3></td>
        
      <?php     
		  }
		  ?>    
  
    </tr>
    <tr>
      <td><h3>support@matrimony.in</h3></td>
      <td><strong> 9123456789</strong></td>
    </tr>
  </table>
</body>
</html>
