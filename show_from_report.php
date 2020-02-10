<?php 
	

require("connect_database.php");  ?>

	<br>
	 
	 	
			
	
		
				<?php


					if(!(empty($_REQUEST['year']) && empty($_REQUEST['term']) && empty($_REQUEST['system']) 
						&& empty($_REQUEST['num'])))
						{
								
								$year = $_REQUEST['year'];
								$term = $_REQUEST['term'];
								$system = $_REQUEST['system'];
								$status = $_REQUEST['status'];
								$num = $_REQUEST['num'];

								?>
									
			<center><h2>ตรวจสอบสถานะระบบ <?php print $system." ปีการศึกษา ".$term."/".$year." จำนวน : ".$num; ?></h2></center>
								<?php
						
							//1
						if($_REQUEST['year'] != "" && $_REQUEST['term'] != ""  && $_REQUEST['system'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and term like '$term' 
								and system like '$system' and status like '$status' ";
								$result = mysqli_query($conn,$sql);
								
							}
			
						if(mysqli_num_rows($result)){
								?>
							<br>
	
						<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' 
						style="width: 98%" id="tblData" align="center">
							<thead> <tr align="center">
												<th>ลำดับ</th>
												<th>ปีการศึกษา</th>
												<th >เทอม</th>
												<th >ระบบ</th>
												<th>สถานที่จัดการเรียนการสอน</th>
												<th width="15%">คณะ</th>
												<th>รหัสวิชา</th>
												<th width="20%">ชื่อวิชา</th>
												<th>ตอนเรียน</th>
												<th>แผ่นที่</th>
												<th>จำนวน(คน)</th>
												<th>สถานะ</th>
											
						   			</tr>
							</thead>
						<!-- <form method="post" action="home_user.php?page=editstatus"> -->
<?php
								
								$n=1;

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
									
								print"<tr><td align='center'>".$n."</td>
									<td align='center'>".$rs['year']."</td>
									<td align='center'>".$rs['term']."</td>
									<td align='center'>".$rs['system']."</td>
									<td>".$rs['place']."</td>
									<td>".$rs['faculty']."</td>
									
									<td>".$rs['subject_id']."</td>
									<td>".$rs['subject_name']."</td>
									<td align='center'>".$rs['section']."</td>
									<td align='center'>".$rs['page']."</td>
									
									<td align='center'>".$rs['number_std']."</td><td>".$status."</td>
									</tr>";
								
									$n++;
									}
								print "</table><br>";
								
							}
							else{

								print "<br><h2 align = 'center'>ไม่พบข้อมูลในฐานข้อมูล</h2>";
							}

							
						}
						
						else
						{}
							?>
					
		
			<br>
<div>