
<!-- Registration Table -->

 CREATE TABLE IF NOT EXISTS sreg
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(30) ,
                            email VARCHAR(255),
                            mobile VARCHAR(12),
                            address VARCHAR(255),
                            password VARCHAR(255),
                            cpassword VARCHAR(255),
                            shopType VARCHAR(20),
                            shopName VARCHAR(50)
                            
                            )"
<!-- TentProduct  -->

CREATE TABLE IF NOT EXISTS TentProduct (
                       Sid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                       Pname varchar(255),
                        Quantity int, 
                        imagePath varchar(255), 
                        ShopId int,
                        FOREIGN KEY (ShopId)
                        REFERENCES sreg (Id)
                        ON DELETE CASCADE                   
                     )"; 


<!-- Other Product -->

 CREATE TABLE IF NOT EXISTS OtherProduct
                                                (Sid INT(11) NOT NULL AUTO_INCREMENT,
                                                 Pname varchar(255),
                                                 imagePath varchar(255),
                                                 ShopId int, 
                                                 PRIMARY KEY(ShopId,Sid),
                                                 FOREIGN KEY (ShopId) REFERENCES sreg (Id) ON DELETE CASCADE  
                                                )";  



<!-- Shop Logo -->

CREATE TABLE IF NOT EXISTS ShopLogo
                                                (
                                                 ShopId int PRIMARY KEY,
                                                 imagePath varchar(255),
                                                 FOREIGN KEY (ShopId)
                                                 REFERENCES sreg (Id)
                                                 ON DELETE CASCADE                    
                                                )";


<!-- Available Products -->

CREATE TABLE IF NOT EXISTS Available_Products
                            (Pid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             Pname VARCHAR(255) ,
                             imagePath varchar(255)                    
                            )";  

<!-- Customer Registration -->

 CREATE TABLE IF NOT EXISTS CustomerReg
                            (Id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(30) ,
                            email VARCHAR(255),
                            mobile VARCHAR(12),
                            address VARCHAR(255), 
                            )";
<!-- Customer Booking                            -->
CREATE TABLE IF NOT EXISTS CustBooking(
                      Cid int,
                      Event_Date date,
                      Duration text,
                      Note text,
                      ShopId int,
                      FOREIGN KEY (ShopId) REFERENCES sreg (Id),
                      FOREIGN KEY (Cid) REFERENCES CustomerReg (Id)
                                                
);

<!-- Customer Booking                            -->
CREATE TABLE IF NOT EXISTS CustProduct(
                      Cid int,
                      ShopId int,
                      PName varchar(255),
                      Quantity int,
                      FOREIGN KEY (ShopId) REFERENCES sreg (Id),
                      FOREIGN KEY (Cid) REFERENCES CustomerReg (Id)
                                                
);



