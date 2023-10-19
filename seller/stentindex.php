<?php 

session_start();
 
$_SESSION['Back'] = '../index.html';
include("header.php");
include("component.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .col-lg-3{
              margin:2rem;
             }
             .card-body{
              display:flex;
              justify-content:space-around;
             }
             input[type="number"]{
              width:4rem;
              padding:5px;
             }
            .common{
                display:flex;
                justify-content:space-around;
                flex-wrap:wrap;
                padding: 1% 10%;
            }
            .body{
             background-color:#FDF5DF;

            }
        </style>
</head>
<body class="body">
    <hr>
    <h1 class="text-center">Stages</h1>
    <hr>
    <div class="common">
           <?php
             component('..\simages\stage1.jpg','stage1');
             component('..\simages\stage2.jpg','stage2');
             component('..\simages\stage3.jpg','stage3');
             component('..\simages\stage4.jpg','stage4');
             component('..\simages\stage5.jpg','stage5');
             component('..\simages\stage6.jpg','stage6');
           ?>
    </div>
    <hr>
    <h1 class="text-center">Curtains</h1>
    <hr>
    <div class="common">
           <?php
             component('..\simages\curtain1.jpg','curtain1');
             component('..\simages\curtain2.jpg','curtain2');
             component('..\simages\entrance2.jpg','entrance2');
             component('..\simages\entrance3.jpg','entrance3');
          
          
           ?>
    </div>

</body>
</html>