<?php 
session_start();
$_SESSION['Back'] = '../index.html';
include('../seller/component.php');



 if(isset($_POST['gotoshop'])){
             $_SESSION['ShopName'] = $_POST['ShopName'];
           }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/cstyle.css">
<link rel="stylesheet" href="../css/style.css">

</head>
<body>



   <header class="header">
   
         
           <a href="<?php echo $_SESSION['Back'];  ?>" style=" font-family:monospace;
            font-size:2rem;background: white; color:black;"class='btn btn-outlined-info'> Back</a> 
        
        <nav class="navbar header-style" style="margin-right: 50%;">
            <h1 style="color:white;font-weight:bold;"> <?php echo $_SESSION['ShopName'] ?></h1>
            
        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>

    </header>
     <div class="customer-cart">
      <?php
        //  session_start();
   print_r($_SESSION, TRUE);
         $count =0;
         if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
         } 
      ?>
        <a href="customer_cart.php"  style ="font-size:2rem;font-family:monospace; background: white; color:black;"class="btn btn-outline-info cartBtn"><i class="bi bi-cart " style="font-size:25px;"></i>Cart(<?php echo $count ?>)</a>
    </div>



    <div class ="products">
    	<?php 

         

           include ('../seller/connect1.php');
           
          
            
             
           $ShopId = $_SESSION['ShopId'];
           $sql1 = "SELECT shopType FROM sreg WHERE id='$ShopId'";
           $result1 = mysqli_query($conn, $sql1);
           $row1 = mysqli_fetch_assoc($result1);
           
           if($row1['shopType']=='tent'){
           $sql = "SELECT * FROM TentProduct WHERE ShopId='$ShopId'";
           $result= mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                         
                         while($row = mysqli_fetch_assoc($result)) {
                             $img = "../".$row['imagePath'];
                            
                            cust_product_component($row['Pname'],$row['Quantity'],$img, $row['ShopId']);
                           
                          }
                        } else {
                          echo "0 results";
                        }
                        
                      
        } else{
           $sql = "SELECT * FROM OtherShopProduct WHERE ShopId='$ShopId'";
           $result= mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                         
                         while($row = mysqli_fetch_assoc($result)) {
                             $img = "../".$row['imagePath'];
                            
                            cust_product_component1($row['Pname'],$img, $row['ShopId']);
                           
                          }
                        } else {
                          echo "0 results";
                        }
                        
                       
        }
         mysqli_close($conn);
        


       


        ?>
    </div>
    


</body>
</html>