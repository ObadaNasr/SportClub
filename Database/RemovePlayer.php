<?php
include '../Database/db_connection.php';
$conn = OpenCon();
if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
}
if (session_status() == PHP_SESSION_NONE) {
                     session_start();
 }
$myEmail=$_POST['EmailPlayer'];
if($_POST['action']==="Delete"){
     $Sql1="select ID From data where (email='$myEmail');";
     $result1=$conn->query($Sql1);
     $row= mysqli_fetch_assoc($result1);
     $id=$row['ID'];
     $Sql2="SELECT * FROM `playerinmatch` WHERE `IDPlayer`='$id';";
     $result2 = $conn->query($Sql2);
     $row2=  mysqli_num_rows($result2);
     
     if($row2>0){
         $sql3="delete From playerinmatch where (IDPlayer='$id');";
         $result3 = $conn->query($sql3);
     }
     $Sql="delete From data where ID='$id';";
     $result = $conn->query($Sql);
     header("Location: ../Trainer/players.php");
    
     
 }else{
     echo "HHH";
 }