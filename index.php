<?php session_start(); 

 if (isset($_SESSION['ss_status']))
        {
                  if($_SESSION['ss_status'] == 'admin')
                  {
                      header('location:home_admin.php');
                      exit();
                  }
                  elseif($_SESSION['ss_status'] == 'user')
                  {
                    header('location:home_user.php');
                    exit();
                  }
        }

?>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="css/glyphicon.css">
        <title>ระบบตรวจสอบสถานะ มสด.6</title>
</head>
<body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <!-- HEADER -->
  <?php include ('header.php'); ?>

  <!-- NAVBAR -->
  <?php include ('navbar_home.php'); ?>
  
  <!--CONTAINER-->
  <?php 

       
       
        
          if(!isset($_GET['page']))
                {

                    include('test.php');
                }
          else
                {
                  switch ($_GET['page']) 
                  {
                  
                  case 'aec':
                        include('check_status_aec.php');
                         break;

                  case 'original':
                        include('check_status.php');
                         break;

                  case 'report':
                        include('test1.php');
                         break;
                         
                  case 'show_from_report':
                        include('show_from_report.php');
                         break;

                  case 'login':
                        include('login.php');
                        break;
                  
                  default:
                    include('test.php');
                    break;
                  }
                }
          
           
        

  ?>

  <!--FOOTER-->
  <?php include('footer.php'); ?>

</body>
</html>