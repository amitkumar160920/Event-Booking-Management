<?php
    session_start();
    $Shop_Name = $_SESSION['ShopName'];


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">

</head>
<body>

      <header class="header">

        <a href="#" class="logo"><span><?php echo$Shop_Name ?></span></a>
       
        <nav class="navbar">
            <a href="yourShop.php">Go To Shop</a>
           
            <a href="../index.html">Log out</a>
        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>

    </header>
    
    <section class="add_product">
        <form method ="post"
            enctype="multipart/form-data"  style="text-align: center; margin-top: 8px;">
                <div class="pDetail">
                         <input type="text" name="product_name" placeholder="product_name">     
                         <?php 
                            
                            if($_SESSION['ShopType'] ==='tent'){
                                echo "<input type='number'  name='qty' placeholder='Quantity'>";
                            }
 
                          ?>      
                         
                </div>
                
                <div>
                    <input type="file" name="my_image">
                    <input type="submit" class="btn btn-success" name="submit" value="upload">
                </div>
         </form>
    </section>
</body>
</html>

<!-- FOR UPLOADING PRODUCT  -->
<?php

   if(isset($_POST['submit'])){
      $product_name = $_POST['product_name'];
      if($_SESSION['ShopType'] == 'tent')
       $quantity = $_POST['qty'];
       
           if(isset($_FILES['my_image'])){
     
          

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $size = $_FILES['my_image']['size'];
        
     
        if($error === 0){
            if($img_size>12500000){
                $em = "size is too large !";
                header("Location :Add_Product.php?error=$em"); 

            }
            else{
                $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = '../upload_ex_product/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                   
                    
                  
                   
                    include('connect1.php');
                    // $dir    = '/var/www/html/dbmsProject/upload_ex_product';
                    $dir    = 'C:\Xampp\Htdocs\dbmsProject\upload_ex_product';

                    $files1 = scandir($dir);

                    if( $_SESSION['ShopType']=='tent'){
                     $sql = " CREATE TABLE IF NOT EXISTS TentProduct (
                       Sid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                       Pname varchar(255),
                        Quantity int, 
                        imagePath varchar(255), 
                        ShopId int,
                        FOREIGN KEY (ShopId)
                        REFERENCES sreg (Id)
                        ON DELETE CASCADE                   
                     )";     

                     mysqli_query($conn, $sql); $x=count($files1)-1;
                         
                        //  $path ="upload_ex_product/".$files1[$x];
                            $path ="C:\Xampp\Htdocs\dbmsProject\upload_ex_product".$files1[$x];
                        
                         $shopId =  $_SESSION['NavSelSid'];
                         $sql1 = "INSERT INTO DBMS.TentProduct(Pname,Quantity, imagePath, ShopId) VALUES('$product_name','$quantity','$path','$shopId')";
                         if (mysqli_query($conn, $sql1)) {
                      echo "New record created successfully";
                           
                            header("refresh:0; url= yourShop.php");
                    } 
                    else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }
                     
                    }else{
                          


                        $sql = " CREATE TABLE IF NOT EXISTS OtherShopProduct
                                                (Sid INT(11) NOT NULL AUTO_INCREMENT,
                                                 Pname varchar(255),
                                                 imagePath varchar(255),
                                                 ShopId int, 
                                                 PRIMARY KEY(Sid),
                                                 FOREIGN KEY (ShopId) REFERENCES sreg (Id) ON DELETE CASCADE  
                                                )";    
                     mysqli_query($conn, $sql);
                         $x=count($files1)-1;
                         
                        //  $path ="upload_ex_product/".$files1[$x];
                        $path ="C:\xampp\htdocs\dbmsProject\upload_ex_product".$files1[$x];
                         $shopId =  $_SESSION['NavSelSid'];
                         $sql1 = "INSERT INTO DBMS.OtherShopProduct(Pname, imagePath, ShopId) VALUES('$product_name','$path','$shopId')";
                         if (mysqli_query($conn, $sql1)) {
                      echo "New record created successfully";
                           
                            header("refresh:0; url= yourShop.php");
                    } 
                    else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }

                    } 

                }
                else{
                    $em = "you can't upload file this type";
                    header("Location :Add_Product.php?error=$em"); 
                }
                echo($img_ex);
            }


        }
        else{
           $em = "unknown error occurred !";
           header("Location :Add_Product.php?error=$em"); 
        }
    }
    

   }
  
?>