<?php
session_start();
if(isset($_SESSION['logged'])){
  if($_SESSION['logged']){
        if(isset($_GET['title']) && $_GET['title'] !== ''){
            //echo "set";
            $title = $_GET['title'];
            require('conn.php');
      $sql1 = "SELECT user_id FROM user_profile WHERE email_address ='$_SESSION[email]'";
      
      $result1 = mysqli_query($conn, $sql1);
      //print_r($result1);
     $postss = mysqli_fetch_all($result1, MYSQLI_ASSOC);
     
     $posts = $postss[0];
     //PRINT_R($posts);
     $userid = (int)$posts['user_id'];
     $sql2 = "SELECT ISBN,Quantity FROM book_table WHERE Book_Title='$title'"; 
     $result2 = mysqli_query($conn, $sql2);
 
    $postss2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    //print_r($postss2);
    $posts2 = $postss2[0];
    $bookid = $posts2['ISBN'];
    $quantity = $posts2['Quantity'];
    $qua = $quantity-1;
    $date1=date('y/m/d');
    $now = strtotime($date1);
    $timeaf2=strtotime('+ 2 days',$now);
    //echo $bookid.$userid;
    $sqlcheck ="SELECT * FROM rent WHERE Book_id=$bookid AND User_id=$userid";
    $resultcheck = mysqli_query($conn, $sqlcheck);
    $postscheck = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
    //print_r($postscheck);
    echo "<br/>";
        
    if(count($postscheck)!=0){
        header("Location: unrent.php");
    }
    else{
    

     $sql2 = "INSERT INTO rent(Book_id, User_id,rent_day, return_day)
        values($bookid,$userid,  '$date1' , '$date1')";
     if ($conn->query($sql2) === TRUE) {
      echo "New record created successfully";

      $sql2 = "UPDATE book_table
      SET Quantity='$qua'
WHERE Book_Title='$title'"; 
       
     if ($conn->query($sql2) === TRUE) {
      echo "New record created successfully";
      header("Location: rentSuccessfull.php");


     
  } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
} 
else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

  
  $conn->close();

    }

        }
        else{
          echo "Not set";
        }
        }
    
    else{
      header("Location: ../html/user_login.html");
  }
}
else{
    header("Location: ../html/user_login.html");
}
?>