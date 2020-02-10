<?php
@ob_start();
session_start();
if(!(isset($SESSION["ss_username"]) || isset($_SESSION["ss_status"])))
    {
        print"<script>alert('กรุณาเข้าสู่ระบบอีกครั้ง');window.location='index.php?page=login';</script>";
        exit();
    }
if($_SESSION["ss_status"] == "user")
    {
        print"<script>alert('ไม่สามารถเข้าสู่หน้านี้ได้เนื่องจากสิทธิการใช้งาน');window.location='home_user.php';</script>";
        exit();
    }

?> 

<html>
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

                include('navbar_admin.php');

                if(!isset($_GET['page'])){

                    include('test.php');
                }
                else{
                    switch ($_GET["page"]) {
                    
                    case 'csv_form':
                        include('page/admin/admin_csv_form.php');
                        break;

                    case 'csv_upload':
                        include('page/admin/admin_csv_upload.php');
                        break;
                    
                    case 'register':
                        include('page/admin/register.php');
                        break;

                    case 'register_save':
                        include('page/admin/register_save.php');
                        break;

                    case 'register_show':
                        include('page/admin/register_show.php');
                        break;

                    case 'pass_change':
                        include('page/admin/pass_change.php');
                        break;

                    case 'pass_save':
                        include('page/admin/pass_save.php');
                        break;

                    case 'check_log':
                        include('page/admin/check_log.php');
                        break;

                    case 'search':
                        include('page/admin/admin_search.php');
                        break;

                    case 'edit_user':
                        include('page/admin/editsearch.php');
                        break;

                    case 'edit_save':
                        include('page/admin/editsave.php');
                        break;

                    case 'setpass':
                        include('page/admin/admin_setpass.php');
                        break;
                    
                    case 'set_save':
                        include('page/admin/setsave.php');
                        break;
                    
                    case 'delete':
                        include('page/admin/delsearch.php');
                         break;
                    
                    case 'pdf':
                        include('test.php');
                         break;

                    case 'aec':
                        include('page/user/aec.php');
                         break;

                    case 'original':
                        include('page/user/user_sdutable.php');
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