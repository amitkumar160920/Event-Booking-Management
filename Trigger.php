<!-- Constraint -->
1. Quantity Constraint
2. Refrential Constraint
3. Customer Count
4. Shop Constraint (Count Shop in Area) 
5. Customer Constraint


<!-- trigger --> 

1] Product Quantity Constraint :  Max 10 Items

Trigger 

 CREATE TABLE IF NOT EXISTS QtyTriggerTable(
                       product_name VARCHAR(255),
                       Quantity int,
                       ShopId int
                       )

CREATE TRIGGER QtyTrigger after INSERT on TentProduct for EACH row 
                       INSERT into QtyTriggerTable(product_name, Quantity, ShopId) VALUES(new.Pname, new.Quantity, new.ShopId)

2] 

 CREATE TABLE IF NOT EXISTS CustomerCount(
                    Cust_MobileNo varchar(12),
                    Count int
                   )

<!-- if customer already exists: -->

CREATE TRIGGER CountTrigger after INSERT on CReg for EACH row
                   INSERT into CustomerCount(Cust_MObileNo,Count) VALUES(new.MobileNo,new.Count+1)