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
            <a class="navbar-brand whitee" href="../../index.php">AAiT Book Store</a>
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

        <!-- Page Heading -->
        <?php
      require('conn.php');


      $sql1 = "SELECT user_id FROM user_profile WHERE email_address ='$_SESSION[email]'";
      
      $result1 = mysqli_query($conn, $sql1);


     $postss = mysqli_fetch_all($result1, MYSQLI_ASSOC);
     
     $posts = $postss[0];
     $userid = (int)$posts['user_id'];
      $sql = "SELECT Book_id FROM rent where User_id='$userid'";

      $result = mysqli_query($conn, $sql);
      
      
     $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
     $len=count($posts);
     
    
    
     
      ?>
       <h1 class="my-4 whitee">AAiT
          <small>Book Store </small>
        </h1>
     <div class="row">
     
        <?php

        if(count($posts)>0){
        
        $counter = 0;
          
          while( $counter < count($posts)){
            
            $row = $posts[$counter];
            $sql = "SELECT Book_Image FROM book_table where ISBN='$row[Book_id]'";
             $result = mysqli_query($conn, $sql);
            
     $postsy = mysqli_fetch_all($result, MYSQLI_ASSOC);
     $post=$postsy[0];
     
            $image_data = $post['Book_Image'];
           $image=substr($image_data,0);
           //echo $image_data;
            //echo "../../$image";
            $encoded_image = base64_encode($image_data);
            $decoded_image = base64_decode($encoded_image);
            
//You dont need to decode it again.
            //$Hinh = "<img src='data:image/png;base64,{$encoded_image}' alt=\"Theis is alt\">";
            //echo $Hinh;
            echo "<h1>$row[Book_id]</h1>";
            echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
            echo "<div class='card hh-100'>";
            echo "<form method='GET'>";
            echo  "<a href='#'><img class='card-img-top' src='../$image_data' height=300px alt='$row[Book_id]'></a>";
            echo  "<div class='card-footer book_det'>";
            echo "<a href='returnback.php?id=$row[Book_id]'> <p class='btn btn-primary'>Return</p></a>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
            $counter++;
          }
        }
        else{
          echo "<h1 class='whitee'>You don't have any rented book from AAiT Book Store</h1>";
        }
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