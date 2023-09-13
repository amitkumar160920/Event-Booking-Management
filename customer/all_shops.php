<?php 

include('cheader.php');
include('../seller/component.php');
session_start();



function getKey($arr, $key) {
    if (array_key_exists($key, $arr)) {
        unset ($_SESSION["cart"]);
        return ;
    } 
}
getKey($_SESSION, 'cart');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tent Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cstyle.css">
   <style>
     .navbar{
            display: flex;
            

        }
        [type ="submit"]{
            background: #333;
            color: white;
            font-size:2rem;
            font-weight: bold;
            margin-left: 1.5rem;
            font-style: monospace;
        }
        input:hover {
      color: yellow;
}
   </style>
</head>
<body>
    <div class="shops">
         <?php 
            $sql ="";
        include('../seller/connect1.php');
         
         if($_POST['submit'] == 'Tent-House'){
            $sql = "SELECT * from sreg WHERE shoptype ='tent'";
         }
         if($_POST['submit'] == 'Catering'){
            $sql = "SELECT * from sreg WHERE shoptype ='catering'";
         }
         if($_POST['submit'] == 'DJ-Sound'){
            $sql = "SELECT * from sreg WHERE shoptype ='dj_sound'";
         }
         if($_POST['submit'] == 'Photography'){
            $sql = "SELECT * from sreg WHERE shoptype ='photography'";
         }
         if($_POST['submit'] == 'Decoration'){
            $sql = "SELECT * from sreg WHERE shoptype ='decoration'";
         }

         $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    
                       $id = $row['id'];
                       $shopname = $row['shopName'];
                       $address = $row['address'];
                       


                       $sql1 ="SELECT imagePath from ShopLogo WHERE ShopId ='$id'";
                     
                       $result1 = mysqli_query($conn, $sql1);

                       if (mysqli_num_rows($result1) > 0) {
                         // output data of each row
                         while($row1 = mysqli_fetch_assoc($result1)) {
                             $img = "../".$row1['imagePath'];
                             if($row['shopType']=='tent')
                             customer_component1($img,$shopname,$address,$id);
                             else
                             customer_component2($img,$shopname,$address,$id);
                           
                          }
                        } else {
                          echo "0 results";
                        }
                        
                        // mysqli_close($conn);
        
        
                }
            }

             else {
                   echo "0 results";
                }
                                
          mysqli_close($conn);
            

            
         ?>
   </div>
   
</body>
</html>