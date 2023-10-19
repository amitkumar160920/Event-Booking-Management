<?php

// stentIndex.php
function component($imagePath,$Item_name){

    $element="
    <div class='col-lg-3'>
    <form action='manage_cart.php' method='post'>
        <div class='card' style='width: 18rem;'>
            <img src=$imagePath style='height:14rem;' class='card-img-top' alt='...'>
            <input type='hidden' value =$imagePath name ='Item_Image'>
            <div class='card-body text-center'>
                <input type='number' placeholder='Qty' name='Quantity'>
                <button type='submit'  name='Add_To_Cart' class='btn btn-info'>Add To Cart</button>
                <input type='hidden' name='Item_Name' value =$Item_name>
            </div>
       </div >
    </form>
  </div>";

  echo $element;
}
//  yourshop.php
function component1($imagePath,$Item_name,$qty){
    $element=" <div class='show_product'>
     <form action=''
            method ='post'>      
            <img src='$imagePath' style='width: 30rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);border-radius:1rem; height:25rem' class='card-img-top' alt='...'>
            <div style='display:flex;justify-content: space-around;font-size: large;'>
                 <span><strong>Quantity:$qty</strong></span>
                 <span><strong>$Item_name</strong></span>
            </div>
            <div style='display:flex;justify-content: space-around;'>
                <input type='hidden' name='productId' value='$imagePath'>   
               <input type='submit' class='btn btn-success' name='upd' value='UPADTE'>
               <input type='submit' class='btn btn-success' name='REMOVE' value='REMOVE'>
          
            </form>
            </div>
    </div>";

  echo $element;
}
function booked_items1($imagePath,$Item_name,$qty){
    $element=" <div class='show'>
            <img src='$imagePath' style='width: 15rem; height:13rem;border-radius:1rem;' class='card-img-top' alt='...'>
            <div style='display:flex;justify-content: space-around;font-size: large;'>
                 <span><strong>Quantity:$qty</strong></span>
                 <span><strong>$Item_name</strong></span>
            </div>
    </div>";

  echo $element;
}
function booked_items2($imagePath,$Item_name){
    $element=" <div class='show'>
            <img src='$imagePath' style='width: 15rem; height:13rem' class='card-img-top' alt='...'>
            <div style='display:flex;justify-content: space-around;font-size: large;'>
                 
                 <span><strong>$Item_name</strong></span>
            </div>
    </div>";

  echo $element;
}
function othercomponent($imagePath,$Item_name){
    $element=" <div class='show_product'>
     <form action=''
            method ='post'>      
            <img src='$imagePath' style='width: 30rem; height:25rem;border-radius:1rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);' class='card-img-top' alt='...'>
            <div style='display:flex;justify-content: space-around;font-size: large;'>
                 <span><strong>$Item_name</strong></span>
            </div>
            <div style='display:flex;justify-content: space-around;'>
                <input type='hidden' name='productId' value='$imagePath'>   
               <input type='submit' class='btn btn-success' name='upd' value='UPADTE'>
               <input type='submit' class='btn btn-success' name='REMOVE' value='REMOVE'>
          
            </form>
            </div>
    </div>";

  echo $element;
}


function customer_component1($imagePath,$shopname,$address,$id)
{
   $element = "<div class='col-lg-3'>
    <form action='../customer/goToShop.php' method='post'>
        <div class='card' style='style=border-radius:1rem;'>
            <img src='$imagePath' style='width: 35rem; height:25rem;border-radius:1rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);' class='card-img-top' alt='...'>    
            <div class='shopcard card-body text-center'>
             <div class='shopTitle'>
                 <h3><strong>$shopname</strong></h3>
                 <h4><strong>$address</strong></h4>
             </div>
             <div>
                <input type ='hidden' value='$id' name='shopId'>
                <input type ='hidden' value='$shopname' name='ShopName'>
                <button  type='submit'  name='gotoshop' class='btn btn-info shopBtn'>Shop</button>
             </div>


           
               
            </div>
       </div >
    </form>
  </div>";

   echo $element;
}


function customer_component2($imagePath,$shopname,$address,$id)
{
   $element = "<div class='col-lg-3' >
    <form action='../customer/goToOtherShop.php' method='post'>
        <div class='card' style='border-radius:1rem'>
            <img src='$imagePath' style='width: 35rem; height:25rem;border-radius:1rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);' class='card-img-top' alt='...'>    
            <div class='shopcard card-body text-center'>
             <div class='shopTitle'>
                 <h3><strong>$shopname</strong></h3>
                 <h4><strong>$address</strong></h4>
             </div>
             <div>
                <input type ='hidden' value='$id' name='shopId'>
                <input type ='hidden' value='$shopname' name='ShopName'>
                <button  type='submit'  name='gotoshop' class='btn btn-info shopBtn'>Shop</button>
             </div>


           
               
            </div>
       </div >
    </form>
  </div>";

   echo $element;
}
function cust_product_component($productName, $Quantity, $imagePath, $ShopId){
    $element = "<div class='col-lg-3'>
    <form action='manage_cust_cart.php' method='post'>
        <div class='product-card card' style='style=border-radius:1rem;'>
            <img src='$imagePath' style='width: 30rem; height:25rem;border-radius:1rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);' class='card-img-top' alt='...'>    
            <div class='shopcard card-body text-center'>
             <div class='shopTitle'>
                 <h3><strong>$productName</strong></h3>
                 <div class='product_qty'>
                    <h4>Quantity:</h4>
                    <input type ='number' min='0' max='$Quantity' value='Quantity' name='Quantity'>
                    <input type ='hidden'  value='$productName' name='Item_Name'>
                    <input type ='hidden'  value='$imagePath' name='Item_Image'>
                    <input type ='hidden'  value='$ShopId' name='ShopId'>
                 </div>

             </div>
             <div>
                <button  type='submit'  name='Add_To_Cart' class='shopBtn btn1 btn-info '>Add To Cart</button>
             </div>
            </div>
       </div >
    </form>
  </div>";

   echo $element;
}
function cust_product_component1($productName, $imagePath, $ShopId){
    $element = "<div class='col-lg-3'>
    <form action='manage_cust_cart.php' method='post'>
        <div class='product-card card' style='style=border-radius:1rem;'>
            <img src='$imagePath' style='width: 29.5rem; height:25rem;border-radius:1rem;filter: drop-shadow(0.25rem 0.25rem 0.5rem #000000);' class='card-img-top' alt='...'>    
            <div class='shopcard card-body text-center'>
             <div class='shopTitle'>
                 <h3><strong>$productName</strong></h3>
                 <div class='product_qty'>
                   
                    <input type ='hidden'  value='$productName' name='Item_Name'>
                    <input type ='hidden'  value='$imagePath' name='Item_Image'>
                    <input type ='hidden'  value='$ShopId' name='ShopId'>
                 </div>

             </div>
             <div>
                <button  type='submit'  name='Add_To_Cart' class='shopBtn btn1 btn-info '>Add To Cart</button>
             </div>
            </div>
       </div >
    </form>
  </div>";

   echo $element;
}
?>