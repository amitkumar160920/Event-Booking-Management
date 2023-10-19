<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart </title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <div class="row">
       <div class="col-lg-12 text-center border rounded bg-light my-5">
        <h1>My Cart</h1>
       </div>  
         <div class="col-lg-9">
             <table class="table">
                <thead class="center">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Item Name:</th>
                  <th scope="col">Quantity:</th>
                  
                </tr>
              </thead>
              <tbody class="center">
                <?php
                $count=0;
                 if(isset($_SESSION['cart'])){
                   foreach($_SESSION['cart'] as $key => $value){
       
                     $count=$count+1;
               
                   echo   "<tr>
                         <td>$count</td>
                         <td>$value[Item_Name]</td>
                         <td><input class ='text-center' type='number'  value = '$value[Quantity]'></td>
                         <td>
                           <form action='stent.php' method='post'>
                              <button name='Remove_Item' class ='btn btn-outline-danger'>REMOVE</button>
                               <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                        </td>    
                     </tr>";
                   }
               }
                ?>
         
             </tbody>
           </table>
       </div>

       <div class="col-lg-3">
        <div class="border bg-light rounded p-4">
           
            <form >
                <button class="btn btn-primary btn-block">Add to Shop</button>
            </form>
        </div>
       </div>
    </div>
   </div> 
</body>
</html>