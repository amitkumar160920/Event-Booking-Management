 <?php 
include 'connect1.php';

if(isset($_POST['submit']) ){

   


   $sql = " CREATE TABLE IF NOT EXISTS sreg
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(30) ,
                            email VARCHAR(255),
                            mobile VARCHAR(12),
                            address VARCHAR(255),
                            password VARCHAR(255),
                            cpassword VARCHAR(255),
                            shopType VARCHAR(20),
                            shopName VARCHAR(50)
                            
                            )";



   mysqli_query($conn, $sql);
  

  $name = $_POST['name'];
  $email = $_POST['email'];
  $contactNo = $_POST['contactNo'];
  $address = $_POST['address'];
  $shoptype = $_POST['shoptype'];
  $shopName = $_POST['shopName'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['confirm']);
 
  $sql = "INSERT INTO DBMS.sreg(name,email,mobile,address,password,cpassword,shopType,shopName) VALUES('$name','$email','$contactNo','$address','$pass','$cpass','$shoptype','$shopName')";
 
   if (mysqli_query($conn, $sql)) {
                      myAlert(" Successfully Registered");
                       header("refresh:1; url= slogin.html");
                    } 
                    else {
                       myAlert("duplicate entry");
                       // header("refresh:1; url= sreg.html");
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

}
function myAlert($msg){
  echo "<script>alert('$msg');</script>";
}



// try{

//   $stmt = $conn->prepare($sql);
//    echo "Table MyGuests created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }
  



//  try{
//   $sql = "INSERT INTO DBMS.sreg(name,email,mobile,address,password,cpassword,shopType,shopName) VALUES(:n,:e,:m,:a,:p,:cp,:st,:sn)";
//   $pass = md5($_POST['password']);
//   $cpass = md5($_POST['confirm']);
//   $stmt = $conn->prepare($sql);
 
    
//   $stmt->execute(
//     array(
//       ':n' => $_POST['name'], 
//       ':e' => $_POST['email'],
//       ':m' => $_POST['contactNo'],
//       ':a' => $_POST['address'],
//       ':p' =>$pass,
//       ':cp'=>$cpass,
//       ':st'=>$_POST['shoptype'],
//       ':sn'=>$_POST['shopName']

//     )
//   );
//   myAlert("Seller Successfully Registered");
//   header("refresh:1; url= slogin.html");
//     exit();
// }
// catch(PDOException $e){
//   myAlert("duplicate entry");
//   header("refresh:1; url= sreg.html");
// }
  


?>







