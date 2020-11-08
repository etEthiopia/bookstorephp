<?php


$ufname = $_POST["fname"];
$ulname = $_POST["lname"];
$uemail = $_POST["email"];
$number = $_POST["phone"];
$pass = $_POST["password"];
$cpass = $_POST["cpassword"];
$adminnot=$_POST["adminnot"];
$type = $_POST["type"];
$join = date('Y/m/d/h/i/s');

require('conn.php');
if($type=="Admin"){
$sql = "SELECT * FROM user_profile WHERE type ='Admin'";
    $result = mysqli_query($conn, $sql);

$posts = $result;
   //$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
   print_r($result);
   //echo 'result '.count($result);
   //echo 'posts '.count($posts);
  //Free Result
  //mysqli_free_result($result);

    if(count($posts)==1){ 
        /*session_start();
        $_SESSION['message'] = 'There is already an admin';
        $_SESSION['error'] = TRUE;
        echo $_SESSION['message'];
        */
        if($adminnot=='yes'){
        header("Location: admin.php?error='Admin already registered'");
        }
        else{
            header("Location: user_register.php?error='Admin already registered'");
        }
        //header("user_register.html"); // Modify to go to the page you would like 
        echo "alert('There is already an admin registered')";
        
        
        exit; 
    }else{ 
        
        //header("Location: user_login.html"); 
        
        exit; 
    } 
}
else{
if($pass!=$cpass){
    echo "password mismatch";
    if($adminnot=='yes'){
        header("Location: admin.php?error='Password Mismatch'");
        }
        else{
    header("Location: user_registerr.php?error='Password Mismatch'");
        }
    exit;
    
}
if(strlen($ufname)<=4){
    echo "First name must be greater than 4";
    if($adminnot=='yes'){
        header("Location: admin.php?error='First name must be greater than 4'");
    }
    else{
    header("Location: user_registerr.php?error='First name must be greater than 4'");
    }
    exit;
    
}
if(strlen($ulname)<=4){
    if($adminnot=='yes'){
        header("Location: admin.php?error='Last name must be greater than 4'");
    }
    else{
    header("Location: user_registerr.php?error='Last name must be greater than 4'");
    }
    exit;
    
}
$sqll = "INSERT INTO user_profile (user_fname, user_lname, user_type, email_address, Phone_Number, password_key, join_table)
VALUES ('$ufname', '$ulname', '$type', '$uemail', '$number', '$pass', '$join')";

if ($conn->query($sqll) === TRUE) {
   
    session_start();
        if($type=="Admin"){
            $_SESSION['type']=$type;

        }
        else{
            $_SESSION['fname']=$ufname;
            $_SESSION['email']=$uemail;
            $_SESSION['type']=$type;
            
        }
    $_SESSION['logged']=TRUE;
    header("Location: ../../index.php");
} else {
    if($adminnot=='yes'){
        header("Location: admin.php?error='Error occured, Try again'");
    }
    else{
    header("Location: user_registerr.php?error='Error occured, Try again'");
    }
    echo "Error: " . $sqll . "<br>" . $conn->error;
}
}

$conn->close();
?>