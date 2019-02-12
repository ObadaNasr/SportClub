<?php
function SignOut(){
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //something posted
        if (isset($_POST['signOut'])) {
            // btnDelete
            return true;
        }
    }
    return false;
}
$_SESSION['isit']=SignOut();
echo $_SESSION['isit'];