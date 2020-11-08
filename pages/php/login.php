<html>
    <head>
	<title>Registration</title>
        <style type="text/css">
            #top{
            position: absolute;
            top: 20%;
            right: 40%;
            background-color: white;
            }
            input{
                font-size: 14px;
                padding: 10px;
                margin: 10px;
                float: left;
            }
            #butt input{
                padding: 10px;
                margin: 10px;
            }
            #info p {
                color: lightseagreen;
                font-size: 18px;
                text-align: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            }
        </style>
    </head>
    <body>
   <!-- <div id="top">
        <span id="info"><p>Log into your account</p></span>
        <div>
        <form action="login.php" method="post">
            <input type="text" placeholder="Username" name = "username"> <br />
            <input type="password" placeholder="Password" name = "password"> <br />
            <span id"butt"><input type="submit" name="submit" onclick="" value="Sign in"><input type="button" onclick="reset()" value="Clear"></span> <br />
            <span><p id="infoInvalid"></p></span>
        </form>
        </div>
    </div>-->
    </body>



<?php 
echo "hello";
if(isset($_POST['submit'])){ 
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "root";            //Database Password 
    $dbDatabase = "php_test";    //Database Name 
    
    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
    //Connect to the databasse 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
    //Selects the database 
     
    /* 
    The Above code can be in a different file, then you can place include'filename.php'; instead. 
    */ 
     
    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $usr = mysql_real_escape_string($_POST['username']); 
    $pas = mysql_real_escape_string($_POST['password']); 
    $sql = "SELECT * FROM user_profile WHERE user_id ='$usr' AND password_key='$pas'"; 
    $result = mysql_query($sql);
    echo "num rows". mysql_num_rows($result);
    if(mysql_num_rows($result) == 1){ 
        $row = mysql_fetch_array($result); 
        session_start(); 
        $_SESSION['username'] = $row['user_id']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: AAiT/html/index.html"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: login.html"); 
        exit; 
    } 
}else{    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: loginnn.php");     
    exit; 
} 
?> 


</html>