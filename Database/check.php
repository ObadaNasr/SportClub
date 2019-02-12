<?php
    include 'db_connection.php';
    $conn = OpenCon();
    if(!$conn){
       die("Connection failed: " . mysqli_connect_error());
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
      if (session_status() == PHP_SESSION_NONE) {
                     session_start();
      }
    $myEmail=test_input($_POST['Email']);
    $myPass=test_input($_POST['Password']);
    
    $Sql="Select email,password,type From Data where (email='$myEmail');";
    $result = $conn->query($Sql);
    if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
                if(test_input($row['email']) == $myEmail&&  password_verify($myPass, $row['password'])){
                    $_SESSION["type"]=$row['type'];
                    $_SESSION["email"]=$row['email'];
                    if($row['type']==1){
                          header("Location: ../Player/Player.php");
                    }else if($row['type']==2){
                          header("Location: ../Trainer/Trainer.php");
                    }
                }else{
                   $_SESSION['valid']=0;
                   header("Location: ../SignIn.php");
                }
         }
    }
    else{
            $_SESSION['valid']=-1;
           header("Location: ../SignIn.php");
    }
   
?>