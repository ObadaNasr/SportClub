<!DOCTYPE html>
<html>
    <head>
          <meta charset="UTF-8">
          <title>create Match</title>
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
          <style>
             .container{
                 width: 40%;
                 margin-top: 100px;
             }
             #submit{
                 margin-left: 40%;
                 margin-top: 5%;
             }
            
             .error {
                color: red;
                
             }
          </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <link href="../CSS/styles.css" rel="stylesheet" type="text/css"/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
          <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
       <div class="header">
             <?php include 'header.php';?>
        </div>
       <div class="container" style="width:20%;">
           <form id="SignUpForm" method="POST" action="../Database/StoreMatch.php" >
               <div class="form-group" >
                   
                      <label for="FirstNameLabel">Match name</label>
                      <input type="text" class="form-control" name="MatchName" id="fname" placeholder="Enter Match name" class="name" value=<?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?>>
               </div>
               <label for="Time">Time</label>
                <div class='col-md-5' style="padding-left: 0px; width: 100%;">
                    <div class="form-group">
                       <div class="input-group date" id="datetimepicker7" data-target-input="nearest" style="width:17rem;">
                            <input type="text" name="DateTime" class="form-control datetimepicker-input" data-target="#datetimepicker7">
                            <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
               <script type="text/javascript">
                $(function () {
                    $('#datetimepicker7').datetimepicker();
                    $('#datetimepicker8').datetimepicker({
                        useCurrent: false
                    });
                    $("#datetimepicker7").on("change.datetimepicker", function (e) {
                        $('#datetimepicker8').datetimepicker('minDate', e.date);
                    });
                    $("#datetimepicker8").on("change.datetimepicker", function (e) {
                        $('#datetimepicker7').datetimepicker('maxDate', e.date);
                    });
                });
            </script>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Sign Up</button>
      </form>
       </div>
       <div class="footer"></div>
       <script src="Validator/ValidateSignUp.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
    </body>
</html>
