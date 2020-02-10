<?php 
	

require("connect_database.php");  ?>



<link rel="stylesheet" href="css/glyphicon.css">
<style type="text/css">
	.btn{
		display: none;
	}
</style>
<script type="text/javascript">

	$(document).ready(function(){
    $("#btn").show();
});

	function ExportToExcel(tableid) {
        var tab_text = "<table border='2px'>";
        var textRange; var j = 0;
        tab = document.getElementById(tableid);//.getElementsByTagName('table'); // id of table
        if (tab==null) {
            return false;
        }
        if (tab.rows.length == 0) {
            return false;
        }

        for (j = 0 ; j < tab.rows.length ; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "download.xls");
        }
        else                 //other browser not tested on IE 11
            //sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            try {
                var blob = new Blob([tab_text], { type: "application/vnd.ms-excel" });
                window.URL = window.URL || window.webkitURL;
                link = window.URL.createObjectURL(blob);
                a = document.createElement("a");
                if (document.getElementById("caption")!=null) {
                    a.download=document.getElementById("caption").innerText;
                }
                else
                {
                    a.download = 'download';
                }

                a.href = link;

                document.body.appendChild(a);

                a.click();

                document.body.removeChild(a);
            } catch (e) {
            }


        return false;
        //return (sa);
    }
</script>
<body>
	
	
	<br>
	 <div class="container">
	 	<center><h2>ตรวจสอบสถานะระบบ AEC</h2></center>
			<form method="POST" action="index.php?page=aec">
			
				<table border="0" align="center" width="93%">
				
				<tr>
					<td> รหัสวิชา </td>
					<td> ตอนเรียน</td> 
					<td> ปีการศึกษา</td>
					<td> ภาคเรียน </td>
					<td> คณะ </td>
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
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//3
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//4
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//5
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['faculty'] != "-- เลือก --" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where faculty like '$faculty' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//6
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2 search
							//12
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//13
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//14
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//15
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//23
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//24
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//25
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//34
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//35
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//45
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}

							// 3 search
							//123
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//124
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//125
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//134
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//135
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//145
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//234
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//235
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//245
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//345
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where year like '$year' and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}

							//4 search
							//1234
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' 
								and term like '$term' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1235
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] == "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' and year like '$year' 
								and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1245
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] == "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and section like '$section' 
								and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//1345
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] == "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' and year like '$year' 
								and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//2345
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where section like '$section' and year like '$year' 
								and term like '$term' and place like '$place' and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}


							//all search
						if($_REQUEST['subject'] != "" && $_REQUEST['section'] != "" && $_REQUEST['year'] != "" && $_REQUEST['term'] != "" && $_REQUEST['faculty'] != "-- เลือก --" && $_REQUEST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from sdu where subject_id like '%$subject%' 
								and section like '$section' 
								and year like '$year' 
								and term like '$term' 
								and faculty like '$faculty' 
								and place like '$place' 
								and system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							//not in form
						if($_REQUEST['subject'] == "" && $_REQUEST['section'] == "" && $_REQUEST['year'] == "" && $_REQUEST['term'] == "" && $_REQUEST['faculty'] == "-- เลือก --" && $_REQUEST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from sdu where system like 'AEC'";
								$result = mysqli_query($conn,$sql);
								
							}
							if(mysqli_num_rows($result)){
								?>
							<br>
	<button class="btn btn-info" onclick = "ExportToExcel('tblData')">บันทึกเป็น Excel</button><br><br>
							<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' style="width : 95%" id="tblData">
							<thead> <tr align="center">
												<th width="7%">ปีการศึกษา</th>
												<th width="5%">เทอม</th>
												<th width="5%">ระบบ</th>
												<th width="10%">สถานที่จัดการเรียนการสอน</th>
												<th width="10%">คณะ</th>
												<th width="7%">รหัสวิชา</th>
												<th width="14%">ชื่อวิชา</th>
												<th width="6%">ตอนเรียน</th>
												<th width="5%">แผ่นที่</th>
												<th width="6%">จำนวน(คน)</th>
												<th width="6%">สถานะ</th>
											
						   			</tr>
							</thead>
						<!-- <form method="post" action="home_user.php?page=editstatus"> -->
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
									</tr>";
								
									
									}
								print "</table><br>";
								
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