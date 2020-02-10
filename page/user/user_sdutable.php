<?php 
	
	
	require("connect_database.php");  ?>

<link rel="stylesheet" href="css/glyphicon.css">	


<body>

	<br>
	 <div class="container">
	 	<center><h2>ตรวจสอบสถานะระบบ เดิม</h2></center>
	 	<?php  
	 		if($_SESSION['ss_status'] == 'user')
	 		{
	 			?>
	 			<form method="POST" action="home_user.php?page=original"><?php
	 		}
	 		elseif($_SESSION['ss_status'] == 'admin')
	 		{
	 			?>
	 			<form method="POST" action="home_admin.php?page=original"><?php	
	 		}

	 	?>
		<!-- <form method="POST" action="home_user.php?page=sdutable"> -->
			
			
				<table border="0" align="center" width="92%">
				
				<tr>
					<td> วิชา </td>
					<td> ตอนเรียน</td> 
					<td> ปีการศึกษา</td>
					<td> ภาคเรียน </td>
					<td> คณะ</td>
					<td> สถานที่จัดการเรียนการสอน</td>
					
					
			
			    <tr>				
				<td><input type="text" class="form-control" name="subject" style="width: 180px; height: 38px;"></td>
				<td><input type="text" class="form-control" name="section" style="width: 180px; height: 38px;"></td>
				<td><input type="text" class="form-control" name="year" style="width: 180px; height: 38px;"></td>
				<td><input type="text" class="form-control" name="term" style="width: 180px; height: 38px;"></td>
				
				<td><select name="faculty" style="width: 180px; height: 38px;">
					<option value="-- เลือก --" selected>-- เลือก --</option>
					<?php 
						$sql_place = "SELECT DISTINCT faculty from sdu ";
						$result_place = mysqli_query($conn, $sql_place);
						while($rs_place = mysqli_fetch_assoc($result_place))
						{
							print "<option>".$rs_place['faculty']."</option>";
						}
					 ?>
					

				</select></td>
				
				
				
				<td><select name="place" style="width: 180px; height: 38px;">
					<option value="-- เลือก --" selected>-- เลือก --</option>
					<?php 
						$sql_place = "SELECT DISTINCT place from sdu ";
						$result_place = mysqli_query($conn, $sql_place);
						while($rs_place = mysqli_fetch_assoc($result_place))
						{
							print "<option>".$rs_place['place']."</option>";
						}
					 ?>
					

				</select></td>


				<td>
				<button type="submit" value="ค้นหา" class="btn btn-outline-info">ค้นหา</button>
				<td>
				</tr>
				</table>

			</div>
		</form>
	</div>
				
			<center>
				<?php


					if(!(empty($_REQUEST['subject']) && empty($_REQUEST['section']) && empty($_REQUEST['year']) && empty($_REQUEST['term']) && empty($_REQUEST['faculty']) && empty($_REQUEST['place'])))
						{
								$subject = $_REQUEST['subject'];
								$section = $_REQUEST['section'];
								$year = $_REQUEST['year'];
								$term = $_REQUEST['term'];
								$faculty = $_REQUEST['faculty'];
								$place = $_REQUEST['place'];
						
							//1
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == ""  && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//3
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//4
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//5
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['faculty'] != "-- เลือก --" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where faculty like '$faculty' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//6
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2 search
							//12
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//13
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//14
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//15
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//23
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//24
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//25
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//34
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//35
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//45
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}

							// 3 search
							//123
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//124
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//125
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//134
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//135
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//145
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{ 
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//234
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//235
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//245
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//345
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}

							//4 search
							//1234
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' 
								and term like '$term' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1235
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' 
								and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1245
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' 
								and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1345
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' 
								and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2345
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' 
								and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}


							//all search
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' 
								and term like '$term' and place like '$place' and system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							//not in form
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['faculty'] == "-- เลือก --" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where system like 'เดิม'";
								$result = mysqli_query($conn,$sql);
								
							}
							if(mysqli_num_rows($result)){
								?>
							<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' style="width : 98%">
							<thead> <tr align="center">
												<th width="7%">ปีการศึกษา</th>
												<th width="4%">เทอม</th>
												<th width="4%">ระบบ</th>
												<th width="15%">สถานที่จัดการเรียนการสอน</th>
												<th width="4%">คณะ</th>
												<th width="8%">รหัสวิชา</th>
												<th width="5%">ชื่อวิชา</th>
												<th width="5%">ตอนเรียน</th>
												<th width="4%">แผ่นที่</th>
												<th width="6.5%">จำนวน(คน)</th>
												<th width="7%">สถานะล่าสุด</th>
												<th width="7%">สถานะปัจจุบัน</th>
												<th width="5%">ยืนยัน</th>
						   			</tr>
							</thead>
					
<?php
								

								while ($rs=mysqli_fetch_assoc($result)) {

									if($rs['status']=='1')
								{
									$status = "<div class='text-warning'><B>ส่ง สวท.</B></div>";
								}
								elseif($rs['status']=='2')
								{
									$status = "<div class='text-success'><B>สวท.รับเอกสาร</B></div>";
								}
								elseif($rs['status']=='3')
								{
									$status = "<div class='text-danger'><B>สวท.ส่งคืน</B></div>";
								}
								else
								{
									$status = 'ยังไม่ระบุ';
								}
									print"<form id='my_form' method ='post' action='page/user/editstatus.php?id=".$rs['sdu_id']."&subject=".$subject."&section=".$section."&year=".$year."&term=".$term."&place=".$place."'>";
								print"<tr><td align='center' width='5%'>".$rs['year']."</td>
									<td align='center'>".$rs['term']."</td>
									<td align='center'>".$rs['system']."</td>
									<td width='15%'>".$rs['place']."</td>
									<td width='15%'>".$rs['faculty']."</td>
									
									<td>".$rs['subject_id']."</td>
									<td width='15%'>".$rs['subject_name']."</td>
									<td align='center' width='5%'>".$rs['section']."</td>
									<td align='center'>".$rs['page']."</td>
									
									<td align='center'>".$rs['number_std']."</td><td>".$status."</td>
									<td>";
									print"<select name = 'status' required>
										<option value = ''selected>-- เลือก --</option>
										<option value = '1'>ส่ง สวท.</option>
										<option value = '2'>สวท.รับเอกสาร</option>
										<option value = '3'>สวท.ส่งคืน</option>

										</select></td>";
									print "<td><input type='submit' value='บันทึก' class='btn btn-primary btn-sm'></form></td></tr>";
									
									}
								print "</table><br>";
								// print "<input type='submit' value='บันทึก'></form>";

								// if(isset($_POST['status']))
								// {
								// 	print_r($_POST['status']);
								// }
							}
							else{

								print "<h2>ไม่พบข้อมูลในฐานข้อมูล</h2>";
							}

							
						}
						
						else
						{}
							?>
					
			</center>
			<br>
		</body>
			

		
	

<!-- </center> -->

<!-- <?php

?>