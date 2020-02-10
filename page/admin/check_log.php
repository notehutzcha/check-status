<link rel="stylesheet" href="css/glyphicon.css">
<body>
<center>
<?php
	require("connect_database.php");

	
?>
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
<br>
<form method="POST" action="home_admin.php?page=check_log">
	<table border="0" align="center" width="48%">
				
				<tr>
					<td> วิชา </td>
					<td> ตอนเรียน</td> 
					
					<td>สถานที่จัดการเรียนการสอน</td>
					<td></td>
			
			<tr>				
				<td><input type="text" class="form-control" name="subject" style="width: 180px; height: 38px;"></td>
				
				<td><input type="text" class="form-control" name="section" style="width: 180px; height: 38px;"></td>
				
				
				
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
				<button type="submit" value="ค้นหา" class="btn btn-outline-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> &nbsp;ค้นหา</button>
				<td>
				</tr>
				</table>

			
		</form>
<?php


						if(!empty($_POST))
						{
								$subject = $_POST['subject'];
								$section = $_POST['section'];
								
								$place = $_POST['place'];
						

							if($_POST['subject'] != "" && $_POST['section'] == ""  && $_POST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where subject_id like '%$subject%') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}
							if($_POST['subject'] == "" && $_POST['section'] != "" && $_POST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where section like '%$section%') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}
							
							if($_POST['subject'] == "" && $_POST['section'] == "" && $_POST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN (select sdu_id from sdu where place like '$place') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}

							if($_POST['subject'] != "" && $_POST['section'] != "" && $_POST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where subject_id like '%$subject%' and section like '%$section%') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}

							if($_POST['subject'] != "" && $_POST['section'] == "" && $_POST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where subject_id like '%$subject%' and place like '$place') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}

							if($_POST['subject'] == "" && $_POST['section'] != "" && $_POST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where section like '%$section%' and place like '$place') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}

							if($_POST['subject'] != "" && $_POST['section'] != "" && $_POST['place'] != "-- เลือก --")
							{
								$sql = "SELECT * from log where sdu_id IN(select sdu_id from sdu where subject_id like '%$subject%' and section like '%$section%' and place like '$place') order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}
							if($_POST['subject'] == "" && $_POST['section'] == ""  && $_POST['place'] == "-- เลือก --")
							{
								$sql = "SELECT * from log order by log_id DESC";
								$result = mysqli_query($conn,$sql);
								
							}
			if(mysqli_num_rows($result)){
?>
	<br>
	<button class="btn btn-info" onclick = "ExportToExcel('tblData')">บันทึกเป็น Excel</button><br><br>
		<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' style="width : 99%" id="tblData">
						<thead><tr align="center">
							<th>ปีการศึกษา</th>
							<th>เทอม</th>
							<th>ระบบ</th>
							<th>คณะ</th>
							<th width="7%">รหัสวิชา</th>
							<th>ชื่อวิชา</th>
							<th width="5%">ตอนเรียน</th>
							<th width="4%">แผ่นที่</th>
							<th width="14%">สถานที่ศึกษา</th>
							<th width="9%">ชื่อ-นามสกุล</th>
							<th width="6%">วันที่</th>
							<th width="8%">สถานะก่อนหน้า</th>
							<th width="8%">สถานะปัจจุบัน</th>
							<th>เวลา</th>
						</tr></thead>
<?php
	while ($rs = mysqli_fetch_assoc($result)) 
	{
		$st_be = $rs['before_status'];
		$st_af = $rs['after_status'];
		if($st_be == '0')
		{
			$f_status = "ยังไม่ระบุ";
		}
		elseif($st_be == '1')
		{
			$f_status = "ส่ง สวท.";
		}
		elseif($st_be == '2')
		{
			$f_status = "สวท. รับเอกสาร";
		}
		elseif($st_be == '3')
		{
			$f_status = "สวท. ส่งคืน";
		}
		else
		{
			$f_status = "ยังไม่ได้บันทึก";
		}

		if($st_af == '1')
		{
			$l_status = "ส่ง สวท.";
		}
	
		elseif($st_af == '2')
		{
			$l_status = "สวท. รับเอกสาร";
		}
		elseif($st_af == '3')
		{
			$l_status = "สวท. ส่งคืน";
		}
		else
		{
			$l_status = "ยังไม่ระบุ";
		}
		

		$username = $rs['username'];
		$id = $rs['sdu_id'];

		$sql_subject = "SELECT * from sdu where sdu_id like '$id'";
		$result_subject = mysqli_query($conn, $sql_subject);
		$rs_subject = mysqli_fetch_assoc($result_subject);

		print "<tr><td align='center'>".$rs_subject['year']."</td>";
		print "<td align='center'>".$rs_subject['term']."</td>";
		print "<td align='center'>".$rs_subject['system']."</td>";
		print "<td>".$rs_subject['faculty']."</td>";
		print "<td>".$rs_subject['subject_id']."</td>";
		print "<td>".$rs_subject['subject_name']."</td>";
		print "<td align='center'>".$rs_subject['section']."</td>";
		print "<td align='center'>".$rs_subject['page']."</td>";
		print "<td>".$rs_subject['place']."</td>";

		
		// print "<td>".$username."</td>";
		$sql_user = "SELECT * from user where username like '$username'";
		$result_user = mysqli_query($conn, $sql_user);
		$rs_user = mysqli_fetch_assoc($result_user);
		$name = $rs_user['font_name'].$rs_user['name']." ".$rs_user['surname'];
		print "<td>".$name."</td>";
		// print "<td>".$rs_user['status']."</td>";
		
		
		print "<td  align='center'>".$rs['log_day']."/".$rs['log_month']."/".$rs['log_year']."</td>";
		
		
		print "<td  align='center'>".$f_status."</td>";
		print "<td  align='center'>".$l_status."</td>";
		print "<td  align='center'>".$rs['log_time']."</td></tr>";
	}
	print "</table><br><br>";
	?>
				<!-- <button type="submit" value="ค้นหา" class="btn btn-outline-info">ค้นหา</button> -->
				
	
	<?php
}
else
{
	print "<center><h2>ไม่พบข้อมูลในฐานข้อมูล</h2></center>";
}

}
else{

}
?>
</center>
</body>