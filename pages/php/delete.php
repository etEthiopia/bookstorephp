<?php
session_start();
    
if(isset($_SESSION['logged'])){
   
    
    if($_SESSION['type']!='Admin'){
        header("Location: ../html/user_login.html");
     
 }
 else{
    
if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    require('conn.php');
    $sql1 = "DELETE FROM user_profile
        WHERE user_id='$delete'";
     if ($conn->query($sql1) === TRUE) {
        $sql2 = "SELECT * FROM rent
        WHERE user_id='$delete'";
        $resultcheck = mysqli_query($conn, $sql2);
        $postscheck = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
        if(count($postscheck)==0){
            unset($delete);
            header("Location: delsuccessful.php");
        }
        else{
        $sql3 = "DELETE FROM rent
        WHERE User_id='$delete'";
        if ($conn->query($sql1) === TRUE) {
            unset($delete);
            header("Location: delsuccessful.php");
        }
        }
 }
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