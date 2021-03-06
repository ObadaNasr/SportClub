<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Player Page</title>
        <meta charset="utf-8">
          <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link href="../CSS/styles.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         <style>
             .container{
                 margin-top: 50px;
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
               if(!isset($_SESSION["type"])||$_SESSION["type"]!=1){
                   header('Location: SignIn.php');
                }
                include '../Database/db_connection.php';
                $conn = OpenCon();
                if(!$conn){
                   die("Connection failed: " . mysqli_connect_error());
                }
                $email=$_SESSION["email"];
                $sql="select * from data where email='$email'";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
        ?>
          <div class="header">
             <?php include 'header.php';?>
        </div>
        <div class="container">
            <ul class="list-group" style="width:320px;">
                <li class="list-group-item"><strong>ID:</strong>    <?php echo $row['ID'];?></li>
                <li class="list-group-item"><strong>Name: </strong>     <?php echo $row['Name']."  ".$row['lastname'];?></li>
                <li class="list-group-item"><strong>Email:</strong>    <?php echo $row['email'];?> </li>
                <li class="list-group-item"><strong> Type User is:</strong>    <?php if($row['type']==1) echo "Player";?> </li>
             </ul>
            
        </div>
        <div class="footer"></div>
       
    </body>
</html>