<!DOCTYPE html>
<html>
<head>
	<title>Booked Item List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<style>
		.booked-Items{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
		}
		.show{
			margin:5rem;
		}
	</style>
</head>
<body>
	<div class="booked-Items">
		
       <?php 
           if(isset($_POST['submit'])){
           	session_start();
       
               include("connect1.php");
               include("component.php");
               $mobile1 = $_POST['mobile1'];
               $Shop_ID = $_SESSION['NavSelSid'];
               $sql1 = "SELECT shopType FROM sreg WHERE id = '$Shop_ID'";
               $result1 = mysqli_query($conn,$sql1);
               $row1 = mysqli_fetch_assoc($result1);
               if($row1['shopType']=='tent'){
                 $sql = "SELECT * FROM Customer_Product WHERE Customer_Mobile='$mobile1' and Shop_ID='$Shop_ID'";
            
                       $result= mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                         while($row = mysqli_fetch_assoc($result)) {
                                 
                             booked_items1($row['Image_Path'],$row['product_name'],$row['Quantity']);

                         }
                    }
                     }
                     else{
             	 $sql = "SELECT * FROM Customer_Product_Other WHERE Customer_Mobile='$mobile1' and Shop_ID='$Shop_ID'";
             	  $result= mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                         while($row = mysqli_fetch_assoc($result)) {
                                 
                             booked_items2($row['Image_Path'],$row['product_name']);

                         }

                     }
             }
               }
                         
               
           



        ?>

	</div>
   
</body>
</html>