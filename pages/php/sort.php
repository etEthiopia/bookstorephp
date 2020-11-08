<?php
 session_start();
    
 if(isset($_SESSION['logged'])){
    
     
     if($_SESSION['type']!='Admin'){
     
      header("Location: ../html/user_login.html");
      exit;
  }
  else{
      if(isset($_GET['sort'])){
          require('conn.php');
          
      }
  }
 }
 else{
     header("Location: ../html/user_login.html");
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
     <link href="../../bootstrap/bootstrapVendor/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/start_template.css" rel="stylesheet">
 

<link href="../css/4-col-portfolio.css" rel="stylesheet">
	<link href="../../bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../css/start_template.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />	
</head>

<body class="xxbody" style="background-image: url(../images/books.jpg);">
	<!--header-->
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
    
    
    <?php
      require('conn.php');
      $sql = "SELECT * FROM user_profile"; 
      $result = mysqli_query($conn, $sql);
  
      
     $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Free Result
    
     
      ?>
      <table class="autoTable" >
        <tr id="">
          <th class='uid'>Id</th>
          <th class='name'>First Name</th>
          <th class='name'>Last Name</th>
          <th class='name'>User Type</th>
          <th class>Email</th>
          <th class>Phone</th>
          <th class>Password</th>
          <th class>Join Table</th>
          <th class>Action</th>
        </tr>
        <tr id="">
          <td class='uid'><a href='sort.php?sort=idd'>\/</a> <a href='sort.php?sort=ida'>/\</a></td>
              <td class="name"><a href='sort.php?sort=fnd'>\/</a> <a href='sort.php?sort=fna'>/\</a></td>
              <td class="name"><a href='sort.php?sort=lnd'>\/</a> <a href='sort.php?sort=lna'>/\</a></td>
              <td class="name"><a href='sort.php?sort=utd'>\/</a> <a href='sort.php?sort=uta'>/\</a></td>
              <td class="name"><a href='sort.php?sort=emd'>\/</a> <a href='sort.php?sort=ema'>/\</a></td>
              <td class="name"><a href='sort.php?sort=phd'>\/</a> <a href='sort.php?sort=pha'>/\</a></td>
              <td class="name"><a href='sort.php?sort=pad'>\/</a> <a href='sort.php?sort=paa'>/\</a></td> 
              <td class="name"><a href='sort.php?sort=jtd'>\/</a> <a href='sort.php?sort=jta'>/\</a></td> 
              <td class="name"></td> 
          
        </tr>      <tbody>
        <?php
        
        
        $counter = 0;
          while( $counter < count($posts)){
            $row = $posts[$counter];

            
            echo
            "<tr>
              <td class>{$row['user_id']}</td>
              <td class>{$row['user_fname']}</td>
              <td class>{$row['user_lname']}</td>
              <td class>{$row['user_type']}</td>
              <td class>{$row['email_address']}</td>
              <td class>{$row['Phone_Number']}</td>
              <td class>{$row['password_key']}</td> 
              <td class>{$row['join_table']}</td> 
              <td class><a href='edit.php?edit=$row[user_id]'>Edit</a><span>||||</span><a href='delete.php?delete=$row[user_id]'>Delete</a>
            </tr>\n";
            $counter++;
          }
        
        ?>
      </tbody>
    </table>
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
	<div class="footer" id="footer">
            <p>&copy; 2018  AAiT Book Store. All rights reserved
                </p>
	</div>
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