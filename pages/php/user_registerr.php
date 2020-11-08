<?php
 session_start();
 if(isset($_GET['error'])){
  $error=$_GET['error'];
}
 if(isset($_SESSION['logged'])){
     echo "hello";
     if($_SESSION['logged']){
     header("Location: ../../index.php");
     }
 }
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Sign up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Fitness Appointment Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
  />
 
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link href="../../bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../css/start_template.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />	
</head>

<body class="xxbody" style="background-image: url(../images/books.jpg);">
	<!--header-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button> 
			<a class="navbar-brand" href="../../index.php">AAiT Book Store</a>
		  </div>
		  <div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
          </ul>
			
		  </div><!--/.nav-collapse -->
  
		</div>
	  </nav>
    <br/>
    
    <?php
      require('conn.php');
      $sql = "SELECT * FROM user_profile"; 
      $result = mysqli_query($conn, $sql);
  
      
     $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Free Result
    
     
      ?>
     
     <?php mysqli_close($conn);
     // ?>
    
	<div class="main-content-agile agill">
		<div class="sub-main-w3 register" id ="narrow">
			<form action="user_register.php" method="post">
      <?php 
    if(isset($error)){
      echo "<h2 class='whitee'>$error</h2>";
      unset($error);
    }
    else{
      echo "<h2>Sign up</h2>";
    }
  ?>
                
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
          <input name='adminnot' value='no' hidden>
          <p id ="cpasserror"></p>
                </div>
                
                <div class="form-style-agile">
                        <select name="type">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                        </select>
                </div>
                <span>
                </span>
                <p id = "err" style="color: red"></p>
				<input id ="button" type="submit" value="Sign Up" onClick='validate()'>
			</form>
		</div>
  </div>
  <?php 
    if(isset($error)){
      echo "<h3 class='whitee'>$error</h3>";
      unset($error);
    }
  ?>
	<!-- //content -->
	<!-- footer -->

	<!-- //footer -->


	<!-- js -->
	<script src="../../bootstrap/jquery-2.1.4.min.js"></script>

	<!-- date-->
	<link rel="stylesheet" href="../../bootstrap/jquery-ui.css" />
	<script src="../../bootstrap/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- //date -->

	<!-- time -->
	<script src="../pages/js/wickedpicker.js"></script>
	<script>
		$('.timepicker').wickedpicker({
			twentyFour: false
		});
	</script>
  
	<link href="../pages/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<!--<script src="../js/validate.js"></script> //time -->


</body>

</html>