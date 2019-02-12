<?php
 include '../Database/db_connection.php';
$conn = OpenCon();
if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
}
session_start();
$IDP=$_SESSION['Email'];
$sql="select ID from data";
$res = $conn->query($sql);
echo mysql_fetch_assoc($res);
//echo $row['ID'];
echo $_POST["ID"];
?>