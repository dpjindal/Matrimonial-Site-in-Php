<?php
require_once 'connection/config.php';



session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['create_profile'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $education = $_POST['education'];
  $occupation = $_POST['occupation'];
  $income = $_POST['income'];
  $family_details = $_POST['family_details'];
  $partner_preferences = $_POST['partner_preferences'];
//  $profile_picture =basename($_FILES['profile_picture']['name']);
  
  $filename = $_FILES["profile_picture"]["name"];
    $tempname = $_FILES["profile_picture"]["tmp_name"];
    $folder = "./image/" . $filename;
        

// Care: shoud be:  $folder = "./image/" . $filename;
  //Define the upload directory
/*  $upload_dir = "profile_photo/";
//  Check if the directory exists, if not create it
  if (!is_dir($upload_dir)) {
	  mkdir($upload_dir, 0777, true);
  }
  //check if the file was uploaded
if(isset($_FILES['profile_picture']))
{
	//gET THE FILE NAME
	$_FILES['profile_picture']['name'];
}
//Get the file extnesin
$file_extension=pathinfo($file_name, PATHINFO_EXTENSION);
//gENERATE A UNIQUE FILE NAME
$unique_file_name=uniqid().'.'.$file_extension;
// Move the uploade file to the upload directory
$file_path = $upload_dir .$unique_file_name;
move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file_path);  */

//insert the file path into the database

$query="SELECT user_id FROM profiles WHERE user_id = '$user_id'";						
$result = mysqli_query($conn, $query);
//$rows = mysqli_fetch_assoc($result);
$count =  mysqli_num_rows($result); // if uname/pass correct it returns must be 1 row

if( $count > 0  ) {
echo "Profile Data is already there";
exit();
}else {



            // Upload file to server 
           move_uploaded_file($tempname, $folder); 

$stmt = mysqli_prepare($conn, "INSERT INTO profiles (user_id, name, gender , dob, height, weight, education, occupation, income, family_details, partner_preferences, profile_picture) VALUES (?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "isssssssssss", $user_id,$name, $gender, $dob, $height, $weight,$education,  $occupation, $income, $family_details,$partner_preferences, $filename );
 // mysqli_stmt_execute($stmt);
  
 
                // Insert image file name into database 
             //   $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())"); 
                if(mysqli_stmt_execute($stmt)){ 
                    echo "The file ".$filename. " and data has been uploaded successfully."; 
                }else{ 
                    echo "File upload failed, please try again. 
."; 
               
			
  }

//  header('Location: display_prof.php');
}


}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creat Profile:Sample Matrimony by Jiinfo</title>
</head>

<body>

<?php
require_once 'include/head.php';
require_once 'include/upper_nav.php';
?>

<form action="" method="post" enctype="multipart/form-data">
<table>
<tr><td colspan="4" align="center" >
<h2>Create your Profile</h2>
</td></tr>
<tr>
<td><label for="name">Name:</label></td> 
<td>  <input type="text" id="name" name="name" > </td>
<td><label>Gender:</label></td>
<td>  <input type="radio" name="gender" value="M"> Male
  <input type="radio" name="gender" value="F"> Female </td> </tr>
<tr><td>  <label for="dob">Date of Birth:</label> </td>
<td>  <input type="date" id="dob" name="dob"></td> 


<td>  <label for="height">Height:</label></td>
<td>  <input type="text" id="height" name="height"></td> 
<tr><td> <label for="weight">Weight:</label></td>
 <td> <input type="text" id="weight" name="weight"></td>
  

<td>  <label for="education">Education:</label></td>
 <td> <input type="text" id="education" name="education"></td>
<tr> <td> <label for="occupation">Occupation:</label></td>
<td>  <input type="text" id="occupation" name="occupation"></td> 

 
 <td> <label for="income">Income:</label></td>
  <td>  <input type="text" id="income" name="income"></td>
 </tr>
<tr>  <td ><label for="family_details">Family Details:</label></td>
 <td colspan="3"> <textarea id="family_details" name="family_details" rows="4" cols="70"></textarea></td>
 </tr>
 <tr>
 <td> <label for="partner_preferences">Partner Preferences:</label></td>
 

 <td colspan="3" > <textarea id="partner_preferences" name="partner_preferences" rows="4" cols="70"></textarea></td> 
 
  </tr>
<tr><td > <label for="profile_picture">Profile Picture:</label></td>
 <td colspan="4" > <input type="file" id="profile_picture" name="profile_picture"></td> </tr>
 
<tr   align="center"><td colspan="4">   <input type="submit" name="create_profile"   value="Create Profile"></td> </tr>
</table>
</form>
</body>
</html>
