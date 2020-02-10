
<?php
session_start();
$_SESSION["user"] = "9";
require("connect_database.php");

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from user WHERE username='" . $_SESSION['ss_username'] . "'");
    $row = mysqli_fetch_array($result);
    
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE user set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION['ss_username'] . "'");
        echo "<script language=\"JavaScript\">";
        echo "alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว');window.location='homeuser.php?username=".$_POST['username']."';";
        echo "</script>";
    } else
    echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถบันทึกรหัสผ่านใหม่ได้');window.location='pass_change.php';";
    echo "</script>";
}
?>

