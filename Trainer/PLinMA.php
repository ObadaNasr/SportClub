<?php
 if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
include '../Database/db_connection.php';
$con=  OpenCon();
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}else{
 $email= $_SESSION['Email'];
 $sql="select ID from data where email='$email';";
 $result=$con->query($sql);
 $row=  mysqli_fetch_assoc($result);
 $IDP=$row['ID'];
 $IDM=$_POST['ID'];
 $Sql2="insert into playerinmatch values('$IDP','$IDM')";
 $result2=$con->query($Sql2);
 header("Location: players.php");
}