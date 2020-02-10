
<?php

include("connect_database.php") ;

$sql = "DELETE FROM user WHERE username = '".$_GET["username"]."'";

if (mysqli_query($conn, $sql)) 
{
    print "<script language=\"JavaScript\">";
    print "alert('ลบข้อมูลของท่านเรียบร้อยแล้ว');window.location='home_admin.php?page=search';";
    print "</script>";
}

mysqli_close($conn);
?>






