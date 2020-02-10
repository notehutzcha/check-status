<?php
   $txtusername = $_GET['username'];
   $txtfont_name = $_POST['font_name'];
   $txtname = $_POST['name'];
   $txtsurname = $_POST['surname'];
   $txtdepartment = $_POST['department'];
   
   require("Connect_database.php");
     $sql = "UPDATE user set username = '$txtusername' ,
                             font_name = '$txtfont_name' ,
                             name = '$txtname',
                             surname = '$txtsurname',
                             department = '$txtdepartment' 
                    WHERE username like '$txtusername' " ;
    
     $query = mysqli_query($conn,$sql);

     if($query)  {
     print "<script language=\"JavaScript\">";
     print "alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว');window.location='home_admin.php?page=search';";
     print "</script>";
                 }
     mysqli_close($conn);
?>


