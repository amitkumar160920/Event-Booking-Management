
<?php 
include 'connect.php';

if(isset($_POST['login']) ){

         

          $sql = "SELECT * from DBMS.sreg where email = :e";
          $pass = md5($_POST['password']);
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':e',$_POST['email']);
          $stmt->execute();
          
          if($stmt->rowCount()>0){
             $getRow = $stmt->fetch(PDO::FETCH_ASSOC);
        if($getRow['password']==$pass)
        {
          myAlert("Login Successfully");
          $email = $_POST['email'];
          $stmt = $conn->query("SELECT Id, shoptype, shopName FROM DBMS.sreg where email='$email';");
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
  
          session_start();

          $_SESSION['NavSelSid'] = $row['Id'];
          $_SESSION['ShopName'] = $row['shopName'];
          $_SESSION['ShopType'] = $row['shoptype'];
       
          if($row['shoptype'] == 'tent'){
                 header("refresh:0; url = stentindex.php");
          } 
          
          else{
            

            $_SESSION['Back']="slogin.html";

          header("refresh:0; url= yourShop.php");
          }

        }
        else
        {
          myAlert("Password is incorrect");
          header("refresh:0; url= slogin.html");
        }
  }
  else{
  myAlert("Email-id Does not exists");
  header("refresh:0; url= slogin.html");
  }

}
?>
<?php
function myAlert($msg){
  echo "<script>alert('$msg');</script>";
}

?>





