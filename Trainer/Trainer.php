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
         <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
         
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
        <div class="container">
            <form method="POST" action="addPlayer.php"> 
                <button  type=submit" class="fa fa-plus fa-5x" Style="width:700px;border:3px solid #000000; margin:10% -75%; padding: 10px 120px;">Add Player</button>
                <button type="submit" class="fa fa-plus fa-5x" formaction="createMatch.php" Style="width:700px;border:3px solid #000000; margin:10% -75%; padding: 10px 90px;">Create Match</button>
            </form>
        </div>
        <div class="footer"></div>
      
    </body>
</html>