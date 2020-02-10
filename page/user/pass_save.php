
<?php
   $currentPassword = $_POST['currentPassword'] ; 
   $newPassword = $_POST['newPassword'];
   // print $currentPassword ; 
   // print $newPassword ; 




include("connect_database.php");

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from user WHERE username='" . $_SESSION['ss_username'] . "'");
    $row = mysqli_fetch_array($result);
    
    if ($currentPassword == $row["password"]) {
        mysqli_query($conn, "UPDATE user set password='" . $newPassword . "' WHERE username='" . $_SESSION['ss_username'] . "'");
        
        print "<script language=\"JavaScript\">";
        print "alert('บันทึกรหัสผ่านใหม่ของท่านเรียบร้อยแล้ว');window.location='home_user.php';"; 
        print "</script>";
    }else {
        print "<script language=\"JavaScript\">";
        print "alert('รหัสผ่านปัจจุบันไม่ตรงกัน');window.location='home_user.php?page=passchange';";
        print "</script>";
    }    
}
?>

