<?php
	
	if(!ereg("([0-9]{4})-([0-9]{3})",$_POST['username']))
	{
		print "<script>alert('Format รหัสพนักงานไม่ถูกต้อง');history.back();</script>";
		exit();
	}
	
	require("connect_database.php");
	$sql = "SELECT * FROM user WHERE username = '".$_POST["username"]."' ";
	$query = mysqli_query($conn,$sql);
	$objResult = mysqli_fetch_array($query);
	if($objResult)
	{
		print "<script language=\"JavaScript\">";
		print "alert('รหัสนี้มีอยู่ในระบบ');window.location='home_admin.php?page=register';";
		print "</script>";
	}
	else
	{

	$sql = "INSERT INTO user (username,password,font_name,name,surname,department,status)
		VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["font_name"]."','".$_POST["name"]."','".$_POST["surname"]."','".$_POST["department"]."','".$_POST["status"]."')";
    	$query = mysqli_query($conn,$sql);
        if($query) {
                print "<script language=\"JavaScript\">";
                print "alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว');window.location='home_admin.php?page=register_show&username=".$_POST['username']."';";
                print "</script>";
            }
            else
        {
            print "<script language=\"JavaScript\">";
            print "alert('ไม่สามารถบันทึกได้');window.location='home_admin.php?page=register';";
            print "</script>";
        }
            
        }
            mysqli_close($conn);


?>

