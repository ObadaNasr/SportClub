<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <meta charset="utf-8">
          <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link href="CSS/styles.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         <style>
             #SignInForm{
                 
                 width: 40%;
                 margin-top: 15rem;
                 margin-left: 20rem;
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
                  
           ?>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

        <div class="header">
             <?php include 'header.php';?>
        </div>
       <div class="container">
           <form method="POST" id="SignInForm" action="Database/check.php">
                <div class="form-group" >
                      <label for="EmailLabel">Email address</label>
                      <input type="text" class="form-control" id="Email" data-validation="email" name="Email" aria-describedby="emailHelp" placeholder="Enter email" margin="100">
                </div>
                <div class="form-group">
                      <label for="PasswordLabel">Password</label>
                      <input type="password" class="form-control" id="password" name="Password"placeholder="Password">
                </div>
               <button type="submit"   class="btn btn-primary" id="submit">Sign In</button>
                      
        </form> 
       </div>
       <div class="footer"></div>
        <script src="Validator/SignInValidation.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
         <?php
             session_destroy();
         ?>
    </body>
</html>
