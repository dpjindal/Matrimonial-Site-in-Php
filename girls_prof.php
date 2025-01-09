 <?php
require_once 'connection/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  
}
$sql = "SELECT * FROM profiles INNER JOIN users ON users.id=profiles.user_id WHERE gender= 'F' ORDER BY UploadedOn DESC , profiles.name ";
$result = mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($result);

if($rowcount > 0){
?>
<h2>


<h2>लडकियोँ के विवाह परिचय पत्रक (नए पत्रक सबसे ऊपर दर्शाए गए हैं</h2><br>
    
	 <table>
     <tr><th width='5%' >Sl. No.</th> 
     <th width='5%' >User_Id</th>
     <th width='10%' >Name</th>
     <th width='10%'>DOB</th>
     <th width='10%'>Education</th>
     <th width='10%'>Occupation</th>
     <th width='10%'>Mobile</th>
     <th width='10%'>View Profile</th></tr>
	 <?php
    while($row = mysqli_fetch_assoc($result)) {
		?>
         <tr align="center">
         <td width='5%' > <?php echo $row["id"]?></td>
		 <td width='5%' > <?php echo $row["user_id"]?></td>
         <td width='10%' > <?php echo $row["name"]?></td>
         <td width='10%'> <?php echo$row["dob"]?></td>
         <td width='10%'> <?php echo$row["education"]?></td>
         <td width='10%'> <?php echo$row["occupation"]?></td>
         <td width='10%'> <?php echo $row["mobile"]?></td>
         
   <td align="center"><a href="display_prof.php?user_id=<?php echo $row['id']; ?>" onClick="return confirm('sure to view !'); " class="link"><img src="image/view.jpg" width="40" height="25" alt="Viewe Profile" title='View' hspace='5' /></a>  </td>
 
   <?php
   $_SESSION['profId'] = $row['id'];
	}
}
	else {
    echo "0 results";
}

mysqli_close($conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gilrs Profiles</title>
</head>

<body>
</body>
</html>