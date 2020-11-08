
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta charset = "UTF-8">
    <meta name = "keywords" content = "HTML, CSS, JAVASCRIPT">
    <meta name = "author" content = "Dagmawi Negussu">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

    <title>AAiT Book Store</title>

    <!-- Bootstrap core CSS <link href="../css/bootstrap.css" rel="stylesheet">-->
    
    <link href="../../bootstrap/bootstrapVendor/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/start_template.css" rel="stylesheet">
     
    
    <link href="../css/4-col-portfolio.css" rel="stylesheet">

    


  </head>

  <body id="body" class="bodyy">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand whitee" href="#">AAiT Book Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <?php
                    session_start();
                      if(isset($_SESSION['logged'])){
                        if($_SESSION['logged']){
                          echo "<li><a class='nav-link' href='user_login.php'>Sign Out</a></li>";
                          echo "<li><a class='nav-link active' href='return.php'>Return Book</a></li>";
                          //header("Location: ../test/login/user_login.html");
                        }
                        else{
                        $_SESSION['logged'] = FALSE;
                        echo "<li><a class='nav-link' href='../html/user_login.html'>Sign In/Up</a></li>";
                        }
                      }
                      else{
                        $_SESSION['logged'] = FALSE;
                        echo "<li><a class='nav-link' href='../html/user_login.html'>Sign Inn/Up</a></li>";
                      }
                    ?>
                    
                  </ul>
              
            </div>
          </div>
        </nav>
    <div class="container">

       <h1 class="my-4 whitee">AAiT
          <small>Book Store </small>
        </h1>
     <div class="row">
     
        <?php


          echo "<h1 class='whitee'>You have already rented and did not return the book</h1>";
          echo "<h1 class='whitee'>Try another book</h1>";
          echo "<a href='../../index.php'>Go Back to Book Shelf</a>";
        
        ?>
        </div>
     
     <?php mysqli_close($conn); ?>
        </div>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../bootstrap/bootstrap.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/jquery.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/bootstrap.bundle.min.js"></script>
  </body>
</html>