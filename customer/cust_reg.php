 <?php 
 session_start();

include '../seller/connect1.php';
include '../mail_sent/tt1.php';

if(isset($_POST['submit']) ){

   

   $sql = " CREATE TABLE IF NOT EXISTS Customer_reg
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(30) ,
                            email VARCHAR(255),
                            mobile1 VARCHAR(12),
                            mobile2 VARCHAR(12),
                            address VARCHAR(255),
                            start_date date,
                            end_date date,
                            start_time VARCHAR(255),
                            comment VARCHAR(255),
                            shop_id int
                            )";    
  
  mysqli_query($conn, $sql);
  


#trigger
  
  $date1=date_create($_POST['start-date']);
  $date2=date_create($_POST['end-date']);
  $diff=date_diff($date1,$date2);
  $r =$diff->format("%R%a days");
  
  if($r>10){

                       $sql= "CREATE TABLE IF NOT EXISTS DateTriggerTable(
                       Cname VARCHAR(255),
                       DateDiff VARCHAR(10),
                       ShopId int
                       )";

                       mysqli_query($conn, $sql);

                       $trg= "CREATE TRIGGER DateTrigger after INSERT on Customer_reg for EACH row 
                       INSERT into DateTriggerTable(Cname, DateDiff, ShopId) VALUES(new.name,'$r', new.shop_id)";

                       mysqli_query($conn, $trg);


                     }


  if(isset($_POST['contactNo2']))
  $contactNo2 = $_POST['contactNo2'];
  else
  $contactNo2 = NULL;

  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contactNo1 = $_POST['contactNo1'];
  $_SESSION['cust_mob']=$contactNo1;
  $venue = $_POST['venue'];
  $sd = $_POST['start-date'];
  $ed = $_POST['end-date'];
  $stime = $_POST['time'];
  $comment = $_POST['comment'];
  $shop_id = $_SESSION['ShopId'];
  
  $sql = "INSERT INTO DBMS.Customer_reg(name,email,mobile1,mobile2,address,start_date,end_date,start_time,comment,shop_id) VALUES('$name','$email', '$contactNo1','$contactNo2','$venue','$sd','$ed','$stime', '$comment','$shop_id')";
 
   if (mysqli_query($conn, $sql)) {
                      myAlert(" Successfully Registered");
                      $sql = "SELECT S.email,S.mobile FROM sreg S where id = '$shop_id'";
                      mysqli_query($conn,$sql);
                     $result= mysqli_query($conn, $sql);  
                     $row = mysqli_fetch_assoc($result);
                     // $data = array("name"=> $name , "email"=>$email, "contact1"=>$contactNo1, "contact2"=>$contactNo2, "venue"=>$venue, "start_date"=>$sd, "end_date"=>$ed,"start_time"=>$stime,"comment"=>$comment, "Shop_Contact"=>$row['mobile']);
                      
                        
                        $str   = '<!DOCTYPE HTML><html>
                                <head>
                                <meta http-equiv="content-type" content="text/html">
                                <title>Email notification</title>
                               <style>
                                 p{
                                  font-size:large;
                                  color:black;
                                 }git
                               </style>

                                </head>
                                <body>
                                <div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">
                                <div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">
                             
                                <p> Name           :'.$name.'</p>
                                <p> Email          :'.$email.'</p>
                                <p> contact No1    :'.$contactNo1.'</p>
                                <p> contact No2    :'.$contactNo2.'</p>
                                <p> Address        :'.$venue.'</p>
                                <p> Start Date     :'.$sd.'</p>
                                <p> End Date       :'.$ed.'</p>
                                <p> Start Time     :'.$stime.'</p>
                                <p> comment        :'.$comment.'</p>
                                <p> Shop Contact   :'.$row['mobile'].'</p>
                                </div>  
                                </div>
                                <div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">
                               </div>
                                </body> 
                                </html>';
                       





 



                      sent_mail($email,$str); 
                      sent_mail($row['email'], $str);        
                  
                   
                            

// sent_mail();                    

                      // header("refresh:1; url= order_placed.php");
                    } 
                    else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }



}
?>
<?php
function myAlert($msg){
  echo "<script>alert('$msg');</script>";
}



                  
                            
	

?>


