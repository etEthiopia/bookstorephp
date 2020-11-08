<?php

        if(isset($_GET['title']) && $_GET['title'] !== ''){
            //echo "set";
            $title = $_GET['title'];
            echo $title;
        }
        else{
          echo "Not set";
        }
        
    
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/bootstrapVendor/css/bootstrap.min.css" rel="stylesheet">

<link href="../css/start_template.css" rel="stylesheet">
 




    

    <!-- Custom styles for this template -->
    <link href="../css/portfolio-item.css" rel="stylesheet">
    <style>
		.xxbody{
			background-image:url(../images/books.jpg);
		}
	</style>
    
  </head>

  <body class="xxbody">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">AAiT Book Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li><a class="nav-link" href="../../index.php">Home</a></li>
                    <?php
                    session_start();
                      if(isset($_SESSION['logged'])){
                        if($_SESSION['logged']){
                          echo "<li><a class='nav-link' href='user_login.php'>Sign Out</a></li>";
                          echo "<li><a class='nav-link' href='return.php'>Return Book</a></li>";
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

    <!-- Page Content -->
    <div class="container">


    <?php
      require('conn.php');
      $sql = "SELECT * FROM book_table WHERE Book_Title='$title'"; 
      $result = mysqli_query($conn, $sql);
  
     $postss = mysqli_fetch_all($result, MYSQLI_ASSOC);
     
     $posts = $postss[0];
     $image_data = $posts['Book_Image'];
      //<!-- Portfolio Item Heading -->
      echo "<br/>";
      
      echo "<h1 class='whitee' class='my-4'>$posts[Book_Title]
        <small class='whitee' >$posts[Author_Name]</small>
      </h1>";
     
      echo "<div class='row'>";

      echo "
        <div class='col-md-4'>
          <div class='card hh-100' id='xx'>
          <img class='card-img-top' src='../$image_data' alt='Image for the book' height=300px>
          </div>
        </div>";

      echo "<div class='col-md-4'>
      <h3 class='whitee' class='my-3'>Book Status</h3>
      <ul>
        <li class='whitee' >Edition: $posts[Edition]</li>
        <li class='whitee' >Category: $posts[Category]</li>
        <li class='whitee' >Price: $posts[Price]</li>
        <li class='whitee' >Quantity: $posts[Quantity]</li>
        <li class='whitee' >Publisher: $posts[Publisher]</li>
        <br/>
        <a href='bookk.php?title=$posts[Book_Title]'> <p id='btn' class='btn btn-primary'>Rent</p></a>;
      </ul>
    </div>
          <div class='col-md-4'>
          <h3 class='whitee' class='my-3'>Description</h3>
          <p class='whitee'>$posts[Book_Description]</p>
          </div>
      </div>";
      ?>
    </div>
    <script src="../../bootstrap/jqueryVendor/jquery.min.js"></script>
    <script src="../../bootstrap/jqueryVendor/bootstrap.bundle.min.js"></script>

  </body>

</html>
