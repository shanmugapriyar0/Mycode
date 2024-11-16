<?php
$name = isset($_POST['name']) ? $_POST['name']: '';
$usname = isset($_POST['usname']) ? $_POST['usname']: '';
$email  = isset($_POST['email']) ? $_POST['email']: '';
$pass1 = isset( $_POST['pass1']) ? $_POST['pass1']: '';
if (!empty($name) || !empty($usname) || !empty($email) || !empty($pass1) )
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mylogin";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (uname1 , email ,upswd1, upswd2 )values(?,?,?,?)";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $name,$usname,$email,$pass1);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>