


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <style>
      .navbar{
        background-color:black;
        margin:0.4rem;
      }
      .headerBtn{
      margin-left:3rem;
      margin-right:2rem;
     }
    </style>
</head>
<body class="body">
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-info headerBtn" aria-current="page" href="<?php echo $_SESSION['Back']?>"><i class="bi bi-back"></i>Back</a>
        </li>   
      </ul>
    </div>
    <div>
          <a class="btn btn-outline-info headerBtn" aria-current="page" href="yourShop.php">Go To Shop</a>
    </div>
    <div>
      <?php
        //  session_start();
   print_r($_SESSION, TRUE);
         $count =0;
         if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
         } 
      ?>
        <a href="mycart.php" class="btn btn-outline-info headerBtn"><i class="bi bi-cart " style="font-size:25px;"></i>Cart(<?php echo $count ?> )</a>
    </div>
  </div>
</nav>
</body>
</html>