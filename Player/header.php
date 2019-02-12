<nav class="navbar navbar-expand-lg" style="background-color: black; color: white;">
                  <a class="navbar-brand" href="#" style="font-family: 'Tangerine', serif; font-size: 48px;text-shadow: 4px 4px 4px #aaa;">SportClub</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 3rem; float: right;">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Player.php">Players<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matches.php">matches</a>
                    </li>
                  </ul>
                  <div class="nav-item dropdown">
                      <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="../image/world.png"  style="width: 30px; height: 30px; margin-right: 10px;">
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="" id="language1">
                        <a class="dropdown-item" href="#">English</a>
                        <a class="dropdown-item" href="#">Arabic</a>
                      </div>
                  </div>
                      <form method="POST">
                      <button type="submit" class="btn btn-info" style="margin-left: 10px; width:90px;" name="signOut">Sign Out</button>
                      </form>
                      
                </div>
                  <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                          //something posted
                          if (isset($_POST['signOut'])) {
                              // btnDelete
                              session_destroy();
                              header("Location:../index.php");
                          }
                      }
                 ?>
</nav>