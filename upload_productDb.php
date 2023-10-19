
<?php
$username ="root";
 $password ="";
 $server ="localhost";
 $db ="DBMS";

$conn = new mysqli($server, $username, $password, $db);

// $dir    = 'simages';
$dir    = 'C:\xampp\htdocs\dbmsProject\simages';
$files1 = scandir($dir);
 $sql = " CREATE TABLE IF NOT EXISTS Available_Products
                            (Pid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             Pname VARCHAR(255) ,
                             imagePath varchar(255)                    
                            )";    
 mysqli_query($conn, $sql);
for ($x = 2; $x < count($files1); $x++) {

     $temp = basename($files1[$x],'.jpg');
     $path ="C:\xampp\htdocs\dbmsProject\simages\".$files1[$x];
     $sql1 = "INSERT INTO DBMS.Available_Products(Pname,imagePath) VALUES('$temp','$path')";
     if (mysqli_query($conn, $sql1)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
 
	
} 
?>
