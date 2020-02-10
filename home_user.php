<html>
<?php
@ob_start();
session_start();

if(!( isset($SESSION["ss_username"]) || isset($_SESSION["ss_status"])))
    {
        print"<script>alert('กรุณาเข้าสู่ระบบอีกครั้ง');window.location='index.php?page=login';</script>";
        exit();
    }
if($_SESSION["ss_status"] == "admin")
    {
        print"<script>alert('ไม่สามารถเข้าสู่หน้านี้ได้เนื่องจากสิทธิการใช้งาน');window.location='home_admin.php';</script>";
        exit();
    }

?> 

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>ระบบตรวจสอบสถานะ มสด.6</title>
</head>
   
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

            <!-- HEADER -->
            <?php include('header.php'); ?>

            <!-- NAVBAR -->
            <?php 

                include('navbar_user.php'); 

                if(!isset($_GET['page'])){

                    include('test.php');
                }
                else{
                    switch ($_GET["page"]) {
                    
                   case 'aec':
                        include('page/user/aec.php');
                         break;

                    case 'original':
                        include('page/user/user_sdutable.php');
                         break;

                    case 'editstatus':
                        include('page/user/editstatus.php');
                        break;
                    
                    case 'passchange';
                        include('page/user/pass_change.php');
                        break;

                    case 'passsave';
                        include('page/user/pass_save.php');
                        break;  

                    default:
                        include('test.php');
                        break;
                }
                }
                


            ?>


            <!-- FOOTER -->
            <?php include('footer.php'); ?>
</body>
</html>