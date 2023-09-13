<?php
    session_start();

    if(isset($_POST['submit']) && isset($_FILES['my_image'])){
       include 'connect.php';
       

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        $size = $_FILES['my_image']['size'];
        
        if($error === 0){
            if($img_size>12500000){
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
                    $dir    = '/var/www/html/dbmsProject/uploadLogo';
                    $files1 = scandir($dir);
                     $sql = " CREATE TABLE IF NOT EXISTS ShopLogo
                                                (
                                                 ShopId int PRIMARY KEY,
                                                 imagePath varchar(255),
                                                 FOREIGN KEY (ShopId)
                                                 REFERENCES sreg (Id)
                                                 ON DELETE CASCADE                    
                                                )";    
                     mysqli_query($conn, $sql);
                         $x=count($files1)-1;
                         
                         $path ="uploadLogo/".$files1[$x];
                         $shopId =  $_SESSION['NavSelSid'];
                         $sql1 = "INSERT INTO DBMS.ShopLogo(ShopId,imagePath) VALUES('$shopId','$path')";
                         // mysqli_query($conn, $sql1);
                         if (mysqli_query($conn, $sql1)) {
                      echo "New record created successfully";
                           
                            header("refresh:0; url= mycart.php");
                    } 
                    else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }
                     

                }
                else{
                    $em = "you can't upload file this type";
                    header("Location :mycart.php?error=$em"); 
                }
                echo($img_ex);
            }


        }
        else{
           $em = "unknown error occurred !";
           header("Location :mycart.php?error=$em"); 
        }
    }
    else{
        header("Location : mycart.php");
    }
    





?>