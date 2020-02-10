<?php

   $newPassword = $_POST['newPassword'];
   $username = $_GET["username"];



include("connect_database.php");

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from user WHERE username='$username'");
    $row = mysqli_fetch_array($result);
    
    
        $result = mysqli_query($conn, "UPDATE user set password='$newPassword' WHERE username='$username'");
        
        if($result)
        {
            print "<script language=\"JavaScript\">";
            print "alert('บันทึกข้อมูลการเปลี่ยนรหัสผ่านของท่านเรียบร้อย');window.location='home_admin.php';";
            print "</script>";
        }
        else{
            print "<script language=\"JavaScript\">";
            print "alert('ไม่สามารถบันทึกข้อมูลได้');window.location='home_admin.php?page=setpass';";
            print "</script>";
        }
        
    

    }

?>

