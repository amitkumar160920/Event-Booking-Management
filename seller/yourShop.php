<?php
session_start();
include('connect1.php');
$Shop_Name = $_SESSION['ShopName'];
$Shop_id = $_SESSION['NavSelSid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Event Organizer Website Design Tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .header-style>a{
            font-family:monospace;
            font-size: 2.5rem;
        }
       
    </style>
</head>

<body>

    <!-- header section starts  -->
    <header class="header">

        <a href="#" class="logo"><span><?php echo$Shop_Name ?></span></a> 
        <form action="" method="post">
          <nav class="navbar header-style">
            <a href="Add_Product.php">Add Product</a>
            <a href="Update_Shop.php">Update Detail</a>
            <a href="update_logo.php">Update Logo</a>
            <a href="booking.php">Bookings</a>
            <a href="../index.html">Log out</a>
            <a href="<?php 
               if($_SESSION['ShopType']=='tent') {
                   echo'stentindex.php';
              }
              else{
               echo $_SESSION['Back'];
                }
               ?>"
              

            >Back</a>
              <button type=submit name='delete_shop' style="margin-left: 20px;" class='btn btn-info'> Delete Shop</button>         
        </nav>
        </form>    
        
         
        <div id="menu-bars" class="fas fa-bars"></div>

    </header> 

    <section class ="shop"> 
    	<div class='col-lg-3'> 
    	<form action='manage_cart.php' method='post'> 
    	<div class='shopcard'>
    	   <?php 

               
                $img ="";
                $sql = "SELECT imagePath FROM ShopLogo where ShopId =$Shop_id";
            	$result = mysqli_query($conn, $sql);
            	
            	if (mysqli_num_rows($result) > 0) {
            	  // output data of each row
            	  while($row = mysqli_fetch_assoc($result)) {
            	     $img = "../".$row['imagePath'];

            	  }
            	} else {
            	  echo "0 results";
            	}
            	
            	mysqli_close($conn);



    	      ?> 
            <img style="filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);width:600px;height:400px;border-radius:2rem;" src=<?php echo $img ?>>

                </div >
             </form>
  </div>
        
    </section>
    <div class="allproducts">
   

    <?php
    

       include('connect1.php');
       	 include('component.php');
       

            if($_SESSION['ShopType']=='tent'){
            $sql = "SELECT Pname,Quantity,imagePath FROM TentProduct where ShopId =$Shop_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                     $img = "../".$row['imagePath'];
                     $pname = $row['Pname'];
                     $Quantity = $row['Quantity'];
                      component1($img,$pname,$Quantity);
                    

                  }
                } else {
                  echo "0 results";
                }


            }else{

                $sql = "SELECT Pname,imagePath FROM OtherShopProduct where ShopId =$Shop_id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                     $img = "../".$row['imagePath'];
                     $pname = $row['Pname'];
                     
                      othercomponent($img,$pname);
                    

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
<?php
 
   if(isset($_POST['REMOVE'])){
               
      if($_SESSION['ShopType']=='tent'){
          removeTentProduct();
       }
       else{
          removeOtherProduct();
       }
        
   	   // echo "<script>alert('Remove clicked');</script>";
   }
   if(isset($_POST['upd'])){
         
         if($_SESSION['ShopType']=='tent'){
          removeTentProduct();
          }
          else{
          removeOtherProduct();
          }
       header("refresh:0; url=Add_Product.php");
   }

   function removeTentProduct(){
     include('connect1.php');
           $pimg = $_POST['productId'];
           $pimg = substr($pimg, 3);
          
           $sql = "DELETE FROM TentProduct WHERE imagePath='$pimg'";
           
           if (mysqli_query($conn, $sql)) {
              header("refresh:0; url= yourShop.php");
           } else {
             echo "Error deleting record: " . mysqli_error($conn);
            }
   }
   function removeOtherProduct(){
     include('connect1.php');
           $pimg = $_POST['productId'];
           $pimg = substr($pimg, 3);
          
           $sql = "DELETE FROM OtherShopProduct WHERE imagePath='$pimg'";
           
           if (mysqli_query($conn, $sql)) {
              header("refresh:0; url= yourShop.php");
           } else {
             echo "Error deleting record: " . mysqli_error($conn);
            }
   }
   if(isset($_POST['delete_shop'])){
       include('connect1.php');
     $Shop_id = $_SESSION['NavSelSid'];
      $sql = "DELETE FROM sreg WHERE Id='$Shop_id'";
           
           if (mysqli_query($conn, $sql)) {
              header("refresh:0; url= ../index.html");
           } else {
             echo "Error deleting record: " . mysqli_error($conn);
            }
   }
?>
