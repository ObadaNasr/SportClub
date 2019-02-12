<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainer Page</title>
        <meta charset="utf-8">
          <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link href="../CSS/styles.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         <style>
             .container{
                 width: 20%;
                 margin-top: 40px;
             }
             #submit{
                 margin-left: 35%;
                 margin-top: 5%;
             }
             #goToSignUp{
                 margin-left: 15%;
             }
              .error {
                color: red;
                
             }

              
         </style>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
          <?php
                 if (session_status() == PHP_SESSION_NONE) {
                     session_start();
                }
               if(!isset($_SESSION["type"])||$_SESSION["type"]!=2){
                   header('Location: ../SignIn.php');
                }
        ?>
        <div class="header">
            <?php include 'header.php';?>
        </div>
        <div class="container" style="width:100%; height: 100%">
            <div style="margin:30px 0;">
                <label style="text-align: center;font-weight: bold;font-size: 1.4em">name Player : </label><input  type="text" class="card-title" name="playerName" value=<?php echo $_POST['playerName']?>  readonly style="width: 230px;margin:5px 50px;padding:0 10px;border-style: inherit;background: white;text-align: center;font-size: 1.4em;">
                <label style="text-align: center;font-weight: bold;font-size: 1.4em">Email :</label><input  type="text" class="card-title" name="EmailPlayer" value=<?php echo $_POST['EmailPlayer']?>  readonly style="width: 260px;margin:5px 50px;padding:0 10px;border-style: inherit;background: white;text-align: center;font-size: 1.2em;">
            </div>
            <?php 
                $_SESSION['Email']=$_POST['EmailPlayer'];
                    
              ?>
            <div class="card-columns" >
                <?php
                    include '../Database/db_connection.php';
                    $conn = OpenCon();
                    if(!$conn){
                       die("Connection failed: " . mysqli_connect_error());
                    }
                    $Sql="Select * From matches;";
                    $result = $conn->query($Sql);
                    if (mysqli_num_rows($result) > 0) {
                         while($row = mysqli_fetch_assoc($result)) {
                               echo '<form method="POST"  action="PLinMa.php">'
                                    .'<div class="card">'.
                                        '<img src="../image/stadium.png" class="card-img-top" style="width:240px;height: 220px; margin:10px 53px;">'.
                                        '<div class="card-body">'.
                                        '<label style="margin:0 55px;">ID Match:</label><input  type="text" class="card-title" name="ID" value="'.$row['ID'].'" readonly style="width: 100px;margin:5px 5px;padding:0 10px;border: none;background: white;text-align: center;font-weight: bold;"><br>'.
                                        '<label style="margin:0 55px;">Name :</label><input  type="text" class="card-text" name="mName" value="'.$row['Name'].'" style="width: 132px;margin:5px 0px;padding:0 0px;border: none;background: white;text-align: center;" readonly><br>'.
                                       '<label style="margin:0 56px;">Time:</label><input  type="text" class="card-text" name="mTime" value="'.$row['Time'].'" style="width: 145px;margin:5px 0px;padding:0 0px;border:none;background: white;text-align: center;" readonly><br>'.
                                        '<button  type="submit" name="action"value="Add" class="btn btn-primary" style="margin:10px  25%;" >Add to this match</button>'.
                                      '</div>'.
                                    '</div>'.
                                 '</form>';
                         }
                    }else{
                        echo "hasn't any player";
                    }
                    
                ?>
                    
                    
           </div>
        </div>
        <div class="footer"></div>
        <?php
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //something posted
                    if (isset($_POST['signOut'])) {
                        // btnDelete
                        session_destroy();
                        mysqli_close($conn);
                        header("Location:index.php");
                        
                    }
                }
        ?>
        
    </body>
</html>

