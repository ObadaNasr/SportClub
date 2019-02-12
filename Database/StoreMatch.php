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

$name=  test_input($_POST['MatchName']);
$Time=  test_input($_POST['DateTime']);

if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO matches (Name,Time) VALUES ('$name','$Time')";

$Sql2="select * from matches where (Name='$name' and Time='$Time');";
$res=mysqli_query($conn,$Sql2);
if (mysqli_num_rows($res) > 0) {
       // output data of each row
          $_SESSION['name']=$name;
          $_SESSION['Time']=$Time;
          header("Location: ../Trainer/createMatch.php");          
}else{
    $res=mysqli_query($conn,$sql);
    header("Location: ../Trainer/Trainer.php");
}           
mysqli_close($conn);
session_destroy($id);
?>
