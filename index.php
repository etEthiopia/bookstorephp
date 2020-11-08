<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset = "UTF-8">
    <meta name = "keywords" content = "HTML, CSS, JAVASCRIPT,PHP, JQUERY">
    <meta name = "author" content = "Dagmawi Negussu, Abel Tefera, Dawit Yonas, Abenezer Kinde, Biruk Nigusse, Desalegn Mihret">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AAiT Book Store</title>
    <link href="bootstrap/bootstrapVendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="pages/css/start_template.css" rel="stylesheet">
	<link href="pages/css/4-col-portfolio.css" rel="stylesheet">
	<style>
		.bac{
			background-image: url(pages/images/ones2.png);
		}
	</style>
  </head>
  <body class="bodyy">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">AAiT Book Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li class="active"><a class="nav-link" href="#">Home</a></li>
                    <?php
                    session_start();
                      if(isset($_SESSION['logged'])){
                        if($_SESSION['logged']){
                          echo "<li><a class='nav-link' href='pages/php/user_login.php'>Sign Out</a></li>";
                          echo "<li><a class='nav-link' href='pages/php/return.php'>Return Book</a></li>";

                          if($_SESSION['type']=='Admin'){
                            echo "<li><a class='nav-link' href='pages/php/admin.php'>Admin</a></li>";
                            echo "<li><a class='nav-link' href='pages/html/registerBookk.html'>Add Book</a></li>";
                          }
                        }
                        else{
                        $_SESSION['logged'] = FALSE;
                        echo "<li><a class='nav-link' href='user_login.html'>Sign In/Up</a></li>";
                        }
                      }
                      else{
                        $_SESSION['logged'] = FALSE;
                        echo "<li><a class='nav-link' href='user_login.html'>Sign Inn/Up</a></li>";
                      }
                    ?>
                  </ul>
            </div>
          </div>
        </nav>
    <div class="container">
        <?php
      require('pages/php/conn.php');
      $sql = "SELECT Book_title, Book_Image, Quantity FROM book_table WHERE Quantity > 0 ORDER BY ISBN ASC"; 
      $result = mysqli_query($conn, $sql);
     $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
     ?>
     <div class="row">
        <?php
        echo "<br/>";
        echo "<br/>";
        $counter = count($posts)-1;
          while( $counter >= 0){
            $row = $posts[$counter];
            $image_data = $row['Book_Image'];
           $image=substr($image_data,0);
            $encoded_image = base64_encode($image_data);
            $decoded_image = base64_decode($encoded_image);
            echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item bac'>";
            echo "<div class='card hh-100'>";
            echo "<form method='GET'>";
            echo  "<a href='pages/php/indexx.php?title=$row[Book_title]'><img class='card-img-top' src='pages/$image_data' height=300px alt='$row[Book_title]'></a>";
            echo  "<div class='card-footer book_det'>";
            echo "<a href='pages/php/indexx.php?title=$row[Book_title]'> <p class='btn btn-primary'>More</p></a>";
            echo  "<span class='quantity' value='$row[Book_title]' name='title'>$row[Quantity]</span>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
			echo "</div>"; 
			
            $counter--;
          }
        ?>
        </div>
     <?php mysqli_close($conn); ?>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jqueryVendor/jquery.min.js"></script>
    
  </body>
</html>