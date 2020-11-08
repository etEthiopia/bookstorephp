<?php
session_start();
if(isset($_SESSION['logged'])){
  if($_SESSION['logged']){
        if(isset($_GET['id'])){
            if($_GET['id']!=''){
                $id=$_GET['id'];
            //echo "set";
            echo $_GET['id'];
            require('conn.php');
     
     
     $sql2 = "SELECT Quantity FROM book_table WHERE ISBN='$id'"; 
     $result2 = mysqli_query($conn, $sql2);
 
    $postss2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    
    $posts2 = $postss2[0];
    $quantity = $posts2['Quantity'];
    $qua = $quantity+1;
    
    
     $sql2 = "DELETE FROM rent
        WHERE Book_id='$id'";
     if ($conn->query($sql2) === TRUE) {
      //echo "New record deleted successfully";

      $sql2 = "UPDATE book_table
      SET Quantity='$qua'
WHERE ISBN='$id'"; 
       
     if ($conn->query($sql2) === TRUE) {
      //echo "New record updated successfully";
      header("Location: ../../index.php");


     
  } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
     }
  
  $conn->close();


}
        else{
            echo $_GET['id'];
          }
        
        }
        else{
          echo "Not set";
        }
        
    }
    else{
      header("Location: ../../index.php");
  }
}
else{
    header("Location: ../html/user_login.html");
}
?>