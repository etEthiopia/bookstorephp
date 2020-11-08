
<!DOCTYPE HTML>
<html>

<head>
	<title>Sign in</title>
	<!-- Meta tag Keywords -->
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
			
			
		  </div>
  
		</div>
	  </nav>

    <br/>
    <br/>
    <br/>
    <br/>
	<div class="main-content-agile">
		<div class="sub-main-w3" id="login">
			<form method="post" action="user_login.php">
				<h2> No Match found, Try Again</h2>
				<div class="form-style-agile">
					<input type="text" id="emaill" placeholder="email" name = "email" required="">
				</div>
				<div class="form-style-agile">
                    <input type="password" id="passs" placeholder="Password" name = "password" required="">
                    <span>
                        <a href="user_registerr.php" id = "link">Not registered? </a>
                    </span>
                </div>
                <p id = "err" style="color: red"></p>
                <input class="signin" type="submit" value="Sign in">
                
			</form>
		</div>
	</div>
	<!-- //content -->
	<!-- footer -->
	<div class="footer" id="footer">
		<p>&copy; 2018  AAiT Book Store. All rights reserved
		</p>
	</div>
	<!-- //footer -->


	<!-- js -->
	<script src="../js/jquery-2.1.4.min.js"></script>

	<!-- date-->
	<link rel="stylesheet" href="../../bootstrap/jquery-ui.css" />
	<script src="../js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- //date -->

	<!-- time -->
	<script src="js/wickedpicker.js"></script>
	<script>
		$('.timepicker').wickedpicker({
			twentyFour: false
		});
	</script>
	<script src="../js/validate.js"></script>
	<link href="../css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<!-- //time -->


</body>

</html>