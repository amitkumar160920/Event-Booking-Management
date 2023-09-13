<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <title> Cart </title>
    <style>
        .container{
          margin-top: 14rem;
          font-size: x-large;
        }
        .text-size{
          text-align: center;
        }
      
  </style>
</head>
<body>
    <header class="header">
   
         
           <a href="redirect_shop.php" style=" font-family:monospace;
            font-size:2rem;background: white; color:black;"class='btn btn-outlined-info'> Back</a> 
    
             <a  href="cust_reg.html" style=" font-family:monospace;
              font-size:2rem;background: white; color:black;"class='btn btn-outlined-info' >Order Now</a>
          
    </header>
       
        
   <div class="container">
    <div class="row">
       <div class="col-lg-12 text-center border rounded bg-light my-5">
        <h1 style="text-align: center;margin-bottom: 5rem">My Cart</h1>
       </div>  
         <div class="col-lg-9">
             <table class="table" style="width: 70%; margin-left:15%;">
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
                     <tr >
                         <td class='text-size'>$count</td>
                         <td class='text-size'><img class ='cart_img' style='width:20rem;height:13rem;' src=$value[Item_Image]></td>
                         <td class='text-size'>$value[Item_Name]</td>
                         <form action='mycart.php' method='post'>
                         <td class='text-size'>$value[Quantity]</td>
                         </form>
                         <td>
                         <form action='manage_cust_cart.php' method='post'>
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
    </div> 
  <!--   <div class="img_add">
     
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
    </div> -->



</body>
</html>
