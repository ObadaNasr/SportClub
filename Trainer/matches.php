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
                 
                 margin-top: 30px;
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
                   header('Location: SignIn.php');
                }
        ?>
        <div class="header">
            <?php include 'header.php';?>
        </div>
        <div class="container">
            <table class="table table-bordered table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">matches</th>
                    <th scope="col">Time</th>
                    <th scope="col">Number Of Player</th>
                  </tr>
                </thead>
                <tbody>
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
                                 $id=$row['ID'];
                                 $Sql2="Select * from playerinmatch where IDMatches='$id';";
                                 $result2 = $conn->query($Sql2);
                                 $row2=  mysqli_num_rows($result2);
                                   echo '<form method="POST"  action="../Database/EditMatch.php">'
                                        .'<tr>'
                                        .'<th scope="row">'.$row['ID'].'</th>'
                                           .'<td>'.$row['Name'].'</td>' 
                                           .'<td>'.$row['Time'].'</td>'
                                           .'<td>'.$row2.'</td>'
                                           .'</tr>'; 
                             }
                        }else{
                            echo "hasn't any matches";
                        }

                    ?>
                 </tbody>
              </table>
        </div>
        <div class="footer"></div>
        <?php
              
                mysqli_close($conn);
              
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