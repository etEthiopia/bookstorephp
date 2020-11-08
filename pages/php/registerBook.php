<html>
    <head>
    <title>Book Registration</title>
</head>
<body>
    <p>Book Registration</p>
</body>

<?php


$title = $_POST["title"];
$author = $_POST["author"];
$edition = $_POST["edition"];
$publisher = $_POST["publisher"];
$category = $_POST["category"];
$price = $_POST["price"];
$description = $_POST["description"];
$quantity = $_POST["quantity"];
$cover = $_POST["cover"];
$pic=$_FILES["cover"]["name"];
//echo $cover;
//echo "<br/>";
//print_r($_POST);

// echo $ufname, $ulname, $uemail, $number, $pass, $status, $join;

// Create connection

// $target = "../images/";
// $ext=".jpg";
// $photoName = md5($title.time().rand(1,100));

// $newName = $target.$photoName.$ext;

// print_r(pathinfo($cover));
// echo "<br/>";
// print_r($_FILES);
// echo "<br/>";
// echo $newName;
// $dbimage = "images/".$photoName.$ext;
// echo "$target . $photoName . $ext";
// if(copy($cover,$newName)){
//     echo "copied";

// }
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $photoName =$pic;
            $target='../images/';
            $photoName = md5($photoName.time().rand(1,100));
            $newName = $target.$photoName.".jpg";
            $dbimage = $newName;
           

if( move_uploaded_file($_FILES['aimage']['tmp_name'],$newName)){
    echo " ";
}

else{
    if(isset($pic)){
        echo "it is set".$pic;
        $photoName = $pic;
         $imageType = pathinfo($photoName,PATHINFO_EXTENSION);
         $photoName = md5($photoName.time().rand(1,100));
         
         //URLROOT.'/public/images/article/'
         
         $destination = '../images/'.$photoName.".".$imageType;
         copy($_FILES['cover']['tmp_name'],$destination);
         $dbimage = 'images/'.$photoName.".".$imageType;
         echo "it is set".$pic;
    }
    else{
        $dbimage = "images/def".$ext;
    echo "not copied";
    }
   
}
echo $cover;
echo $newName;


//This gets all the other information from the form

require('conn.php');

$sql = "INSERT INTO book_table (Author_Name, Book_Title, Category, Publisher, Book_Image, Quantity, Edition, Price, Book_Description)
                        VALUES ('$author' ,'$title', '$category', '$publisher', '$dbimage', '$quantity', '$edition', '$price' ,'$description')";

if ($conn->query($sql) === TRUE) {
    
    echo "New record created successfully";
    echo $cover;
    echo "<br/>";
    echo "I am in ".$cover;
    echo "<br/>";
    echo "I am in ".$quantity;
    
    $registered = TRUE;
    header("Location: updateStatus.php?book=YES");
    
} else {
    
    $registered = FALSE;
    header("Location: updateStatus.php?book=NO");
    
}


$conn->close();

?>

</html>