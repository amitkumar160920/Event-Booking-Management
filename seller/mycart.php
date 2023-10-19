<?php 
session_start();
$_SESSION['Back']="mycart.php";
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart </title>
    <style>
         .col-lg-2{
          position: absolute;
          top: 22rem;
          left: 55rem;  
         }
         .img_add{
          position: absolute;
          left: 55rem;
          top: 20rem;
          width: 24rem;
         }
        .cart_img{
            width:5rem;
            border-radius: 20%;
            vertical-align: middle;
        }
        tbody,thead{
          text-align:center;
        }
        .text-size{
          font-size:large;
        }
        .sp{
          padding-left:20rem;
        }
    </style>
</head>
<body>
   <div class="container">
    <div class="row">
       <div class="col-lg-12 text-center border rounded bg-light my-5">
        <h1>My Cart</h1>
       </div>  
         <div class="col-lg-6">
             <table class="table">
                <thead class="center">
                <tr>
                  <th class='text-size' scope="col">S.No</th>
                  <th class='sp text-size' scope="col">Item Image</th>
                  <th class='text-size' scope="col">Item Name</th>
                  <th class='text-size' scope="col">Quantity</th>
                  
                </tr>
              </thead>
              <tbody class="center">
                <?php
                $total = 0;
                $count=0;

                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key => $value){
                   //  print_r($value);
                     $count=$count+1;                     
                     echo "
                     <tr>
                         <td class='text-size'>$count</td>
                         <td class='sp'><img class ='cart_img' src=$value[Item_Image]></td>
                         <td class='text-size'>$value[Item_Name]</td>
                         <form action='mycart.php' method='post'>
                         <td class='text-size'>$value[Quantity]</td>
                         </form>
                         <td>
                         <form action='manage_cart.php' method='post'>
                              <button name='Remove_Item' class ='btn btn-outline-danger'>REMOVE</button>
                               <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                               </td>    
                         </form>
                     </tr>";
                    }

                }
                ?>
         
             </tbody>
           </table>
       </div>
     </div>
       <div class="col-lg-2">
        <form action='manage_cart.php' method='post'>
        <div class="border bg-light rounded p-4 text-center" style="position: absolute;left: 3rem;top: 5rem;">
           <button type="submit" name="empty_cart" class="btn btn-primary btn-block"><i class="bi bi-shop" style="font-size:30px"></i></button>
          <h4>Add To Shop</h4>
        </div>
      </form>
  
      </div>
    </div> 
    <div class="img_add">
     
     <?php if(isset($_GET['error'])):?>
           <p><?php echo $_GET['error']; ?></p>
        <?php endif  ?> 

        <form action="upload_shop_img.php"
            method ="post"
            enctype="multipart/form-data">
         <h3>Add Shop logo</h3>
         <input type="file" name="my_image">
         <input type="submit" class="btn btn-success" name="submit" value="upload">
         
         </form>
    </div>



</body>
</html>
