
<?php

 $username ="root";
 $password ="";
 $server ="localhost";
 $db ="DBMS";

try{
	 $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Connection Successfully";
} catch(PDOException $e){
	echo "Connection failed : ".$e->getMessage();
}
?>