<?php 
 session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
   
    <header class="header">

       
         
         
           <a href="../index.html" style=" font-family:monospace;
            font-size:2rem;background: white;color: black"class='btn btn-outlined-info'> Back</a> 
        
         <nav class="navbar" >
            
           <form action="all_shops.php" method="post">
               <input type = "submit" name = "submit" value="Tent-House">
           </form>
            <form action="all_shops.php" method="post">
               <input type = "submit" name = "submit" value="Catering">
           </form>
           <form action="all_shops.php" method="post">
               <input type = "submit" name = "submit" value="DJ-Sound">
           </form>
           <form action="all_shops.php" method="post">
               <input type = "submit" name = "submit" value="Photography">
           </form>
           <form action="all_shops.php" method="post">
               <input type = "submit" name = "submit" value="Decoration">
           </form>



           
        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>

    </header>
</body>
</html>