<?php
require_once 'connection/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM profiles WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
	
  $weight = $_POST['weight'];
  $education= $_POST['education'];
$occupation= $_POST['occupation'];
 $income = $_POST['income'];
 
 $filename = $_FILES["profile_picture"]["name"];
    $tempname = $_FILES["profile_picture"]["tmp_name"];
    $folder = "./image/" .$filename ;

$family_details=$_POST['family_details'];
$partner_preferences=$_POST['partner_preferences'];
 

 
   move_uploaded_file($tempname, $folder);
  
 
if(!$stmt = mysqli_prepare($conn, "UPDATE profiles SET  weight=?, education=?, occupation=?, income=?, family_details=?, partner_preferences=?, profile_picture=? WHERE user_id =? ")){
	echo "Prepare failed: (".mysqli_errno($conn).")".mysqli_error($conn);}
  mysqli_stmt_bind_param($stmt, "sssssssi",  $weight,$education,  $occupation, $income, $family_details,$partner_preferences, $filename, $user_id );
  mysqli_stmt_execute($stmt); 


 if(mysqli_stmt_execute($stmt))
 {
	 echo "Updateed Succeffully!";
 }
 else
 {
	 
 echo "Error updating daa: ".mysqli_error($conn);
 }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile: Sample Matrimony by Jiinfo</title>
</head>

<body>
<div >
<?php
require_once 'include/head.php';
include_once "include/upper_nav.php";
?>

<form action="" method="post" enctype="multipart/form-data">

<table>
<tr><td colspan="4" align="center" >
<h2>Edit Profile (Name, Height and Gender cannot be changed)</h2>
</td></tr>
<tr>

 <td> <label for="weight">Weight:</label></td>
 <td> <input type="text" id="weight" name="weight" value="<?php echo $rows['weight']; ?>"></td>
 <td>  <label for="education">Education:</label></td>
 <td> <input type="text" id="education" name="education"  value="<?php echo $rows['education']; ?>"></td>
</tr>

  <tr>

 <td> <label for="occupation">Occupation:</label></td>
<td>  <input type="text" id="occupation" name="occupation"  value="<?php echo $rows['occupation']; ?>"></td> 
<td> <label for="income">Income:</label></td>
<td>  <input type="text" id="income" name="income"  value="<?php echo $rows['income']; ?>" ></td> 
</tr>
 <tr>
 
 <td > <label for="profile_picture">Profile Picture:</label> 
<td colspan="4" > <input type="file" id="profile_picture" name="profile_picture"  value="<?php echo $rows['profile_picture']; ?>"></td></tr>
<tr>  <td ><label for="family_details">Family Details:</label></td>
 <td colspan="3"> <input type="text" id="family_details" name="family_details" rows="4" cols="70" value="<?php echo $rows['family_details']; ?>"></td>
 </tr>
 <tr>
 <td> <label for="partner_preferences">Partner Preferences:</label></td>
 <td colspan="3" > <input type="text" id="partner_preferences" name="partner_preferences" rows="4" cols="70" value="<?php echo $rows['partner_preferences']; ?>" ></td> 
  </tr>  -->
<tr   align="center"><td colspan="4">   <input type="submit" name="update" value="Update Biodata"></td> </tr>
</table>
</form>


</body>
</html>
