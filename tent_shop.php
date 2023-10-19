<!DOCTYPE html>
<html>
<head>
	<title>Tent Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class='col-lg-3'>
    <form action='manage_cart.php' method='post'>
        <div class='card' style='width: 18rem;'>
            <img src=$imagePath class='card-img-top' alt='...'>
            <input type='hidden' value =$imagePath name ='Item_Image'>
            <div class='card-body text-center'>
                <input type='number' placeholder='Qty' name='Quantity'>
                <button type='submit'  name='Add_To_Cart' class='btn btn-info'>Add To Cart</button>
                <input type='hidden' name='Item_Name' value =$Item_name>
            </div>
       </div >
    </form>
  </div>
</body>
</html>