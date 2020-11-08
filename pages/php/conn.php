    <?php
    $dbhost = 'localhost';
	$dbuser = 'root';
    $dbpass = '';
    $dbase = 'BookStore';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbase);
	
	if(! $conn){
    echo "Couldnt";
    die('Could not connect: ' . mysql_error());
    }
   

    ?>
    
