<?php 
    session_start();
    
    if(isset($_SESSION['logged'])){
        echo "hello";
        
        if($_SESSION['logged']){
            $_SESSION['logged']=FALSE;
            $_SESSION['type']="";
            $_SESSION['email']="";
            session_destroy();
            header("Location: ../html/user_login.html");
        }
    }
    else{
        header("Location: ../html/user_login.html");
    }
    
?>
<?php 


if(isset($_POST['email'])){ 
    require('conn.php');

    $usr = $_POST['email']; 
    $pas = $_POST['password']; 
    $sql = "SELECT * FROM user_profile WHERE email_address ='$usr' AND password_key='$pas'"; 
    $result = mysqli_query($conn, $sql);

    
   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
   if(count($result))
   echo 'result '.count($result);
   echo 'posts '.count($posts);
  //Free Result
    mysqli_free_result($result);

    if(count($posts)==1){ 
        session_start(); 
        print_r($posts);
        echo "<br/>";
        $newArray=array_values($posts[0]);
        print_r($newArray);
        $_SESSION['email'] = $newArray[4]; 
        $_SESSION['type'] = $newArray[3]; 
        $_SESSION['logged'] = TRUE; 
        echo "<br/>";
        if($_SESSION['type']=='Admin'){
            echo "I am an Adminstrator";
            header("Location: admin.php");
        }
        else{
            echo "I am a user";
            header("Location: ../../index.php"); 
        }
        echo $_SESSION['type'];
            // Modify to go to the page you would like 
        exit; 
    }
    else{ 
        echo "Error in form";
        header("Location: user_loginn.php"); 
        
        exit; 
    } 
}

?> 
