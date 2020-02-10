<?php 
	session_start();
	date_default_timezone_set("Asia/Bangkok");
	$username = $_SESSION['ss_username']; 
	// print "วันที่ :".date("d/m/Y")."<br>";
	// print "เวลา :".date("h:i:s");

	$d = date("d");
	$m = date("m");
	$y = date("Y") + 543;
	
	$time = date("H:i:s");
	require("../../connect_database.php");
	if(isset($_POST))
	{
		$status = $_POST['status'];
		
		$id = $_GET['id'];
		$subject = $_GET['subject'];
		$section = $_GET['section'];
		$year = $_GET['year'];
		$term = $_GET['term'];				
		$place = $_GET['place'];


		
		$sql_check = "SELECT status,system from sdu where sdu_id = '$id'";
		$result_check = mysqli_query($conn, $sql_check);
		$rs=mysqli_fetch_assoc($result_check);
		$f_status = $rs['status']; //first status or before status
		$system = $rs['system'];
		
		
		if($status != "-- เลือก --")
			{
				$sql = "UPDATE sdu set status ='$status' where sdu_id like '$id'";
				$result = mysqli_query($conn, $sql);

				if($result)
				{
					$sql = "INSERT into log(username, sdu_id, before_status, after_status, log_day, log_month, log_year, log_time) 
					values('$username', '$id', '$f_status', '$status', '$d', '$m', '$y', '$time')";
					$result = mysqli_query($conn, $sql);
					if($_SESSION['ss_status'] == 'user')
					{
						
						// print "<script>alert('บันทึกข้อมูลสำเร็จแล้ว'); </script>";
						if($system == "เดิม")
						{
							print "<script>window.location='../../home_user.php?page=original&subject=".$subject."&section=".$section."&year=".$year."&term=".$term."&place=".$place."'; </script>";
						}
						elseif($system == "AEC")
						{
							print "<script>window.location='../../home_user.php?page=aec&subject=".$subject."&section=".$section."&year=".$year."&term=".$term."&place=".$place."'; </script>";
						}
						
					}
					elseif($_SESSION['ss_status'] == 'admin')
					{
						// print "<script>alert('บันทึกข้อมูลสำเร็จแล้ว'); </script>";
						if($system == "เดิม")
						{
							print "<script>window.location='../../home_admin.php?page=original&subject=".$subject."&section=".$section."&year=".$year."&term=".$term."&place=".$place."'; </script>";
						}
						elseif($system == "AEC")
						{
							print "<script>window.location='../../home_admin.php?page=aec&subject=".$subject."&section=".$section."&year=".$year."&term=".$term."&place=".$place."'; </script>";
						}
						
						
					}
					
				}
				else
				{
					print "<script>alert('ไม่สามรถแก้ไขได้');history.back(); </script>";
				}
			}
		
		
	}
	



?>