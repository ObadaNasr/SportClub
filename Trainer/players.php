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
                 margin-top: 200px;
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
            <div class="card-columns" >
                <?php
                    include '../Database/db_connection.php';
                    $conn = OpenCon();
                    if(!$conn){
                       die("Connection failed: " . mysqli_connect_error());
                    }
                    $Sql="Select * From Data where type=1;";
                    $result = $conn->query($Sql);
                    if (mysqli_num_rows($result) > 0) {
                        $self=$_SERVER['PHP_SELF'];
                         while($row = mysqli_fetch_assoc($result)) {
                               echo '<form method="POST"  action="../Database/RemovePlayer.php">'
                                    .'<div class="card">'.
                                        '<img src="../image/player.png" class="card-img-top" style="width:200px;height: 220px; margin:10px 77px;">'.
                                        '<div class="card-body">'.
                                        '<input  type="text" class="card-title" name="playerName" value="'.$row['Name']." ".$row['lastname'].'" readonly style="width: 230px;margin:5px 50px;padding:0 10px;border-style: inherit;background: white;text-align: center;font-weight: bold;font-size: 1.4em;">'.
                                        '<input  type="text" class="card-text" name="EmailPlayer" value="'.$row['email'].'" style="width: 230px;margin:5px 50px;padding:0 10px;border-style: inherit;background: white;text-align: center;" readonly>'.
                                        '<button  type="submit" name="action" formaction="addPlayerInMatch.php" value="Add" class="btn btn-primary" style="margin:10px  12px;" >Add to matches</button>'.
                                        '<button  type="submit" name="action" value="Delete" class="btn btn-primary" style="margin:10px  12px; ">Delete Player</button>'.
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
                        header("Location:index.php");
                    }
                }
        ?>
    </body>
</html>