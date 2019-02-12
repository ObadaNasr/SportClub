<?php
include 'db_connection.php';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (session_status() == PHP_SESSION_NONE) {
      session_start();
      $id=  session_id();
}
$conn = OpenCon();

$fName=  test_input($_POST['firstName']);
$lName=  test_input($_POST['lastName']);
$password= test_input($_POST['SignUpPassword']);
$Email= test_input($_POST['SignUpEmail']);
$Type=  test_input($_POST['choose']);
$passwordHashed=password_hash($password, PASSWORD_BCRYPT);
if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO Data (Name,lastname,email,Password,type) VALUES ('$fName','$lName','$Email','$passwordHashed','$Type')";

$Sql2="select * from Data where (email='$Email');";
$res=mysqli_query($conn,$Sql2);
if (mysqli_num_rows($res) > 0) {
       // output data of each row
    $row = mysqli_fetch_assoc($res);
      if($Email == $row['email'])
      {
          $_SESSION['firstNameBack']=$fName;
          $_SESSION['lastNameBack']=$lName;
          $_SESSION['EmailBack']=$Email;
          header("Location: ../Trainer/addPlayer");          
      }
}else{
    $res=mysqli_query($conn,$sql);
    header("Location: ../Trainer/Trainer.php");
}           
mysqli_close($conn);
session_destroy($id);

?>

