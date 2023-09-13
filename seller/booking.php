<?php 
session_start();



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
   
         
           <a href ="yourShop.php" style=" font-family:monospace;
            font-size:2rem;background: white; color:black;"class='btn btn-outlined-info'> Back</a> 
        
        <nav class="navbar header-style" style="margin-right: 50%;">
            <h1 style="color:white;font-weight:bold;"> <?php echo $_SESSION['ShopName'] ?></h1>
            
        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>

    </header>
   
   <table style="position: absolute;top:15rem;" class="table">
                <thead class="center" style="font-size: x-large;">
                <tr>
                  <th class='text-size' scope="col">S.no</th>
                  <th class='sp text-size' scope="col">Customer Name</th>
                  <th class='text-size' scope="col">Email</th>
                  <th class='text-size' scope="col">Mobile1</th>
                  <th class='text-size' scope="col">Mobile2</th>
                  <th class='text-size' scope="col">Address</th>
                  <th class='text-size' scope="col">Start_date</th>
                  <th class='text-size' scope="col">End_date</th>
                  <th class='text-size' scope="col">Start Time</th>
                  <th class='text-size' scope="col">Comment</th>
                  <th class='text-size' scope="col">Added Items</th>
                  
                </tr>
              </thead>
              <tbody class="center" style="font-size: small;font-weight: bold;">
                <?php
                session_start();
                include("connect1.php");

                $count=0;
                $ShopId =  $_SESSION['NavSelSid'];


                       $sql = "SELECT * FROM Customer_reg WHERE shop_id='$ShopId' ORDER BY start_date";
                       $result= mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                         
                         while($row = mysqli_fetch_assoc($result)) {
                            $count = $count+1;
                            
                             if(date("Y-m-d")<$row['start_date']){
                                       echo "<form method='post' action='book_items_list.php' > <tr>
                         <td class='text-size'>$count</td>
                         <td class='text-size'>$row[name]</td>
                         <td class='text-size' >$row[email]</td>
                         <td class='text-size'>$row[mobile1]</td>
                         <td class='text-size'>$row[mobile2]</td>
                         <td class='text-size'>$row[address]</td>
                         <td class='text-size'>$row[start_date]</td>
                         <td class='text-size'>$row[end_date]</td>
                         <td class='text-size'>$row[start_time]</td>
                         <td class='text-size'>$row[comment]</td>
                         <input type='hidden' name='mobile1' value=$row[mobile1] />
                         <td class='text-size'> <button type='submit' name='submit' style='font-family:monospace;
            font-size:1rem;background: blue' class='btn btn-outlined-info'> Check</button> </td>
                     </tr></form>";
                             }
                              
                           
                          }
                        } 

                        else {
                          echo "0 results";
                        }
                        
                        mysqli_close($conn);
                    



                ?>
                
             </tbody>
           </table>
    


</body>
</html>