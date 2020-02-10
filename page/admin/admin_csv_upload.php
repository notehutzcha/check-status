<html>
<center>
<body>
<br>
<?php

date_default_timezone_set("Asia/Bangkok");
$regis_time=date("Y-m-d H:i:s");
// $type= strrchr($_FILES["fileCSV"]["name"],".");
$type= substr($_FILES["fileCSV"]["name"],-4);

if($type != ".csv")
{
	print"<script>alert('นามสกุลไฟล์ ต้องเป็น csv เท่านั้น');history.back();</script>";
	exit();
}
else
{

	$file_name = basename($_FILES["fileCSV"]["name"]);

	$target_dir = "csv/";
	$target_file = $target_dir . $file_name; //ที่ ที่เก็บไฟล์หลังอัปโหลด

	if(move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$target_file))// Copy/Upload CSV
	{
		
	} 
	else
	{
		print"<script>alert('ไม่สามารถอัปโหลดไฟล์ได้');history.back();</script>";
		exit();
	}

 require("connect_database.php");

 ini_set('max_execution_time', 300);
 set_time_limit(300);

// print"<h2>ผลการเพิ่มข้อมูล มสด.6CSV</h2>";
// print"<table border = '1' width='40%'>";
// print"<th bgcolor=#FFA500><center>รหัสประจำนักศึกษา</th><th bgcolor=#FFA500><center>สถานะ</th>";

$objCSV = fopen($target_file, "r");
$i=0;
$n=0;
$success=0;
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE)
 {
 	$i++;
 	if($i<2) continue;

 	$year = $objArr[0];
 	$term = $objArr[1];
 	$system = $objArr[2];
 	$place = $objArr[3];
 	$faculty = $objArr[4];
 	$branch = $objArr[5];
 	$course = $objArr[6];
 	$subject_id = $objArr[7];
 	$subject_name = $objArr[8];
 	$section = $objArr[9];
 	$page = $objArr[10];
 	$level = $objArr[11];
 	$number_std = $objArr[12];

 	if(count($objArr) != 13)
 	{
 		print"<script>alert('การจัดวาง Format ไม่ถูกต้อง : error code 13');history.back();</script>";
		exit();
 	}

 	if($year =="")
 	{
 		break;
 	}
	else
	{
		$sql_check = "SELECT sdu_id from sdu where year like '$year' 
		and term like '$term' 
		and system like '$system'
		and place like '$place' 
		and faculty like '$faculty' 
		and branch like '$branch'
		and course like '$course' 
		and subject_id like '$subject_id'
		and subject_name like '$subject_name'
		and section like '$section'
		and page like '$page'
		and level like '$level'
		and number_std like '$number_std'";
		$result_check = mysqli_query($conn, $sql_check);
		if(!mysqli_num_rows($result_check))
		{
			$strSQL = "INSERT INTO sdu(year, term, system, place, faculty, branch, course, subject_id, subject_name, section, page, level, number_std, status) 
			VALUES('$year', '$term', '$system', '$place', '$faculty', '$branch', '$course', '$subject_id', '$subject_name', '$section', '$page', '$level', '$number_std', '0')";
			$objQuery = mysqli_query($conn, $strSQL);
			if($objQuery)
			{
				$success = $success+1;
			}
		}
		else
		{
			$n = $n+1;
		}

		
	}
		

}



if(!$objQuery)
	{
		print"<script>alert('การจัดวาง Format ไม่ถูกต้อง หรือ ข้อมูลทั้งหมดซ้ำกับในฐานข้อมูล : error code 0');history.back();</script>";
		exit();
	}
	else{
		$num = $i-1;
		// print"<script>alert('เพิ่มข้อมูลการลงทะเบียนรียบร้อยแล้ว จำนวน ".$num."');</script>";
		?>
		<div class="container">
  		
		  <div class="card" style="width:350px">
		    <img class="card-img-top" src="img/success.gif" alt="Card image" style="width:70%">
		    <div class="card-body">
		      <h4 class="card-title">บันทึกข้อมูลสำเร็จ</h4>

		      <p class="card-text">อัปโหลด จำนวน : <?php print $num; ?> แถว</p>
		      <p class="card-text">บันทึกสำเร็จ จำนวน : <?php print $success; ?> แถว</p>
		      <p class="card-text">มีข้อมูลที่ซ้ำกับในฐานข้อมูล จำนวน : <?php print $n; ?> แถว</p>
		      <a href="home_admin.php" class="btn btn-primary">กลับสู่หน้าหลัก</a>
		    </div>
		  </div>
		<?php
	}



?>
</table>
<!-- <center><a href =""><input type ="button" class='btn btn-outline-info' value="กลับไปหน้าเพิ่มข้อมูลจากไฟล์ CSV"></a></center> -->
<br><br>
</body>
</center>
</html>
<?php } ?>