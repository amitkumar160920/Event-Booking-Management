<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image upload </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
         .upload{
            display:flex;
            justify-content:center;
        }
        h1{
            text-align:center;
        }
        div{
            margin:4rem;
        }
        .shop_desc{
            display:flex;
            flex-direction:column; 
            width:400px;
            margin-left:40%;
         }
    </style>
</head>
<body>
        <h1>Upload your shop images and Info about your shop & services provide by you</h1>
        <?php if(isset($_GET['error'])):?>
            <p><?php echo $_GET['error']; ?></p>
        <?php endif  ?>
        <form action="upload_file.php"
               method ="post"
               enctype="multipart/form-data">
            <div class="upload">
                <input type="file" name="my_image">
                <input type="submit" class="btn btn-success" name="submit" value="upload">
            </div>
             <div class="shop_desc">
                  <h2>About your shop & services</h2>
                 <textarea name="About_shop" id="" cols="30" rows="10"></textarea> 
                 <input type="submit" class="btn btn-success" name="submit" value="submit">
             </div>
        </form>
</body>
</html>
</body>
</html>