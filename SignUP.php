<!DOCTYPE html>
<html>
    <head>
          <meta charset="UTF-8">
          <title>Sign Up</title>
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
          <link href="CSS/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <?php
             if (session_status() == PHP_SESSION_NONE) {
                 session_start();
             }
              if(isset($_SESSION['EmailBack'])){
                 echo "<script>"
                  . " alert('This Email is Exist');"
                         . "</script>";
             }
         ?>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
       <div class="header">
             <?php include 'header.php';?>
        </div>
       <div class="container">
           <form id="SignUpForm" method="POST" action="Database/Store.php" >
               <div class="form-group" >
                   
                      <label for="FirstNameLabel">First Name</label>
                      <input type="text" class="form-control" name="firstName" id="fname" placeholder="Enter first name" class="name" value=<?php if(isset($_SESSION['firstNameBack'])) echo $_SESSION['firstNameBack'] ?>>
               </div> 
               <div class="form-group" >
                      <label for="LastNameLabel">Last Name</label>
                      <input type="text" class="form-control" name="lastName"  id="lname" placeholder="Enter last name" class="name" value=<?php if(isset($_SESSION['lastNameBack']))  echo $_SESSION['lastNameBack']; ?>>
               </div>
                <div class="form-group" >
                      <label for="EmailLabel">Email address</label>
                      <input type="text" class="form-control" id="emailAddress" name="SignUpEmail" aria-describedby="emailHelp" placeholder="Enter email" value=<?php if(isset($_SESSION['EmailBack']))  echo $_SESSION['EmailBack']; ?> >
                </div>
               <div class="input-group mb-3">
                    <div class="input-group-prepend" >
                      <label class="input-group-text" for="inputGroupSelect01">Type Users</label>
                    </div>
                   <select class="custom-select" id="inputGroupSelect01" name="choose">
                        <option value="1" selected>Player</option>
                      <option value="2">Trainer</option>
                      
                    </select>
               </div>

                <div class="form-group">
                      <label for="PasswordLabel">Password</label>
                      <input type="password" class="form-control" id="pass" name="SignUpPassword" placeholder="Password">
                </div>
               <div class="form-group">
                      <label for="ConfirmPasswordLabel">Confirmed Password</label>
                      <input type="password" class="form-control" name="ConfirmPassword"  id="Cpass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Sign Up</button>
      </form>
       </div>
       <div class="footer"></div>
       <script src="Validator/ValidateSignUp.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

       <?php
       
        session_destroy();
       ?>

    </body>
</html>
