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

    




<link href="../css/4-col-portfolio.css" rel="stylesheet">


<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />	


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
<?php
session_start();
    
if(isset($_SESSION['logged'])){
   
    
    if($_SESSION['type']!='Admin'){
        header("Location: ../html/user_login.html");
     
 }
 else{
    
if(isset($_GET['edit'])){
    $_EDIT=$_GET['edit'];
    require('conn.php');
}
else{
    header("Location: admin.php");
}


}
}
else{
    header("Location: ../html/user_login.html");
}
?>

    <div class="container">
            <form action="updatestatus.php" method="post">
       <h1 class="my-4 whitee">AAiT
          <small>Book Store </small>
        </h1>
        <input type="hidden" value="<?php echo $_EDIT?>" name="edit">
     <div class="row">
     <div class="form-style-agile">
          <input id="fname" type="text" placeholder="First Name" name = "fname" required="" onchange="fname()">
                </div>
                <p id ="fnameerror"></p>
                <div class="form-style-agile">
          <input id="lname" type="text" placeholder="Last Name" name = "lname" required="" onchange="lname()">
          <p id ="lnameerror"></p>
                </div>
				<div class="form-style-agile">
          <input id="email" type="email" placeholder="email" name = "email" required="">
          <p id ="emailerror"></p>
                </div>
                <div class="form-style-agile">
                        <input id="phone" type="tel" placeholder="Phone" name = "phone" required="" onchange="phone()">
                        <p id ="phoneerror"></p>
                    </div>
				<div class="form-style-agile">
          <input id="pass" type="password" placeholder="Password" name = "password" required="" onchange="pass()">
          <p id ="passerror"></p>
                </div>
                <div class="form-style-agile">
          <input id="cpass" type="password" placeholder="Re-Password" name = "cpassword" required="" onchange="cpass()">
          <p id ="cpasserror"></p>
                </div>
                <span>
                </span>
                <p id = "err" style="color: red"></p>
				<input id ="button" type="submit" value="Update" onClick='validate()'>
			</form>
		</div>
  </div>
        



        </div>
     
     <?php mysqli_close($conn); ?>
        </div>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../bootstrap/bootstrap.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/jquery.min.js"></script>
    <script src="../../bootstrap/bootstrapVendor/bootstrap.bundle.min.js"></script>
  </body>
</html>