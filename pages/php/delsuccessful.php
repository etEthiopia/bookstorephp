<?php
 session_start();
    
 if(isset($_SESSION['logged'])){
    
     
     if($_SESSION['type']!='Admin'){
     
      header("Location: ../html/user_login.html");
      exit;
  }
 }
 else{
     header("Location: ../html/user_login.html");
 }
?>
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
          </div>
        </nav>
    <div class="container">

       <h1 class="my-4 whitee">AAiT
          <small>Book Store </small>
        </h1>
     <div class="row">
     
        <?php


          echo "<h1 class='whitee'>Deletion Successful</h1>";
          echo "<a href='admin.php'>Go Back to User Managment</a>";
        
        ?>
        </div>
     

        </div>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../bootstrap/bootstrap.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/jquery.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/bootstrap.bundle.min.js"></script>
  </body>
</html>