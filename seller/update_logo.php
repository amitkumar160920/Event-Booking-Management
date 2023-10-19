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
            <a href="Remove_Product.php">Remove Product</a>
            <a href="Update_Shop.php">Update Detail</a>
            <a href="../index.html">Log out</a>
        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>

    </header>
    
    <section class="add_product">
        <form method ="post"
            enctype="multipart/form-data"  style="text-align: center; margin-top: 8px;">
               
                <h1 style="font-size: xx-large; margin-bottom: 5rem">Upload your shop Logo</h1>
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
     
           if(isset($_FILES['my_image'])){
     
          

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $size = $_FILES['my_image']['size'];
        
     
        if($error === 0){
            if($img_size>125000){
                $em = "size is too large !";
                header("Location :mycart.php?error=$em"); 

            }
            else{
                $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = '../uploadLogo/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                   
                    include('connect1.php');
                    // for linux:
                    // $dir    = '/var/www/html/dbmsProject/uploadLogo';

                    // for windows:
                    $dir    = 'C:\Xampp\Htdocs\dbmsProject\uploadLogo';
                    
                    $files1 = scandir($dir);
                
                    $x=count($files1)-1;
                         
                     $path ="uploadLogo/".$files1[$x];
                     $shopId =  $_SESSION['NavSelSid'];  




                      
                    $sql = "SELECT * FROM ShopLogo WHERE ShopId=$shopId";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                           $sql = "UPDATE ShopLogo SET imagePath='$path' WHERE ShopId=$shopId"; 
                           $res = mysqli_query($conn, $sql);
                              // header("Location :mycart.php?"); 
                           header("refresh:0; url= yourShop.php");
                    } else {
                          $sql = "INSERT INTO ShopLogo(ShopId,imagePath) VALUES('$shopId','$path')";
                           mysqli_query($conn, $sql);

                    }
                      


                 

                    
                     

                }
                else{
                    $em = "you can't upload file this type";
                     header("refresh:0; url= update_logo.php");
                     
                }
                echo($img_ex);
            }


        }
        else{
           $em = "unknown error occurred !";
            header("refresh:0; url= update_logo.php");
        }
    }
    

   }
  
?>