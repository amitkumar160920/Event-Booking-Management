<?php
session_start();



    if(isset($_POST['Add_To_Cart'])){

        
            
             $myitems = array_column($_SESSION['cart'],'Item_Name');
             
             if(in_array($_POST['Item_Name'],$myitems)){
                echo "<script>
                      alert('Item Alredy added');
                      window.location.href='stentindex.php';
                      </script>";
                    }
                    
                    
            else if(count($_SESSION['cart'])>0){
                  
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Item_Image'=>$_POST['Item_Image'],'Quantity'=>$_POST['Quantity']);
                echo "<script>
                      alert('Item  added');
                      window.location.href='stentindex.php';
                      </script>";
                      
                    }
                
              
               else{
                    // if cart is not set 
                    $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Item_Image'=>$_POST['Item_Image'],'Quantity'=>$_POST['Quantity']);
                    echo "<script>
                          alert('Item  added');
                          window.location.href='stentindex.php';
                          </script>";
         
    }
  }
    if(isset($_POST['Remove_Item'])){

          echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        foreach($_SESSION['cart'] as $key => $value){
             
            if($value['Item_Name']==$_POST['Item_Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']= array_values($_SESSION['cart']);
                echo "<script>
                alert('Item  Removed');
                window.location.href='mycart.php';
                </script>";
              
            }
        }
    
}
if(isset($_POST['empty_cart'])){
           
           include('connect1.php');
          $shopId =  $_SESSION['NavSelSid'];
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

                      mysqli_query($conn, $sql);
      

                    // print_r($strarr);
          
          foreach($_SESSION['cart'] as $key => $value){
              
           
                 // echo gettype($value);
                 $pname = $value['Item_Name'];
                 $qty = $value['Quantity'];

                 $sql = "SELECT Pname,imagePath FROM Available_Products WHERE Pname='$pname' ";
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                     $img = $row['imagePath'];
                     $pname = $row['Pname'];
                   
                      // Trigger if shopkeeper try to add more than 10;
                     if($qty>10){

                       $sql= "CREATE TABLE IF NOT EXISTS QtyTriggerTable(
                       product_name VARCHAR(255),
                       Quantity int,
                       ShopId int
                       )";

                       mysqli_query($conn, $sql);

                       $trg= "CREATE TRIGGER QtyTrigger after INSERT on TentProduct for EACH row 
                       INSERT into QtyTriggerTable(product_name, Quantity, ShopId) VALUES(new.Pname,$qty, new.ShopId)";

                       mysqli_query($conn, $trg);


                     }

                    
                 $sql1 = "INSERT INTO DBMS.TentProduct(Pname,Quantity, imagePath, ShopId) VALUES('$pname','$qty','$img','$shopId')";
                         // mysqli_query($conn, $sql1);
                         if (mysqli_query($conn, $sql1)) {
                     
                            // header("refresh:0; url= mycart.php");
                    } 
                    else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }  
                


                  }
                } 
         
                 
           
           }
        
          // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
          unset ($_SESSION["cart"]);
          echo "<script>
                alert('cart Empty');
                window.location.href='mycart.php';
                </script>";
}


?>