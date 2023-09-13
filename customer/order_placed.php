<?php 

session_start();
include '../seller/connect1.php';

if(isset($_POST['submit'])){
	// print_r($_SESSION['cart']);

 $sql1 = " CREATE TABLE IF NOT EXISTS Customer_Product
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            product_name VARCHAR(30) ,
                            Quantity INT,
                            Image_Path VARCHAR(255),
                            Shop_Id INT,
                            Customer_Mobile VARCHAR(12)
                            )";    
  
  mysqli_query($conn, $sql1);

  $sql1 = " CREATE TABLE IF NOT EXISTS Customer_Product_Other
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            product_name VARCHAR(30),
                            Image_Path VARCHAR(255),
                            Shop_Id INT,
                            Customer_Mobile VARCHAR(12)
                            )";    
  
   mysqli_query($conn, $sql1);
  $shop_id = $_SESSION['ShopId'];
  $contact =$_SESSION['cust_mob'];

  $sql2 = "SELECT * FROM sreg WHERE Id='$shop_id'";
  $result2 = mysqli_query($conn, $sql2);
           $row2 = mysqli_fetch_assoc($result2);
          
      foreach($_SESSION['cart'] as $key => $value){
              
           
                 // echo gettype($value);
                 $pname = $value['Item_Name'];
                 
                 $pImage = $value['Item_Image'];

                  

                      if($row2['shopType']=='tent'){
                        $qty = $value['Quantity'];
                    $sql1 = "INSERT INTO DBMS.Customer_Product(product_name,Quantity, Image_Path, Shop_Id,Customer_Mobile) VALUES('$pname','$qty','$pImage','$shop_id','$contact')";
                  }
                  else{
                     $sql1 = "INSERT INTO DBMS.Customer_Product_Other(product_name, Image_Path, Shop_Id,Customer_Mobile) VALUES('$pname','$pImage','$shop_id','$contact')";
                  }
                         // mysqli_query($conn, $sql1);
                         if (mysqli_query($conn, $sql1)) {
                            
                    } 
                    else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }  
                


                  }

                  myAlert("Booking Confirmed");

                            header("refresh:0; url= '../index.html");
                    
                  session_destroy(); 
         
                 
           
           }






           function myAlert($msg){
  echo "<script>alert('$msg');</script>";
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <style>
    	.order{
    		margin-top:20rem;
    		width: 100%;
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		flex-direction: column;
    	}
    </style>
 </head>
 <body>
   <div class="order">
   	    <h1 class="text-center">Click To Confirm your Order</h1>
   	    <form method="post">
   	    	 <input type="submit" style="background-color: #31d2f2; color:black;"class ="btn btn-outlined-info" value ="Confirm" name="submit">
   	    </form>
   	   
   </div>
 </body>
 </html>