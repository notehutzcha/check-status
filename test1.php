<br><center>
  <div class="card" style="width: 60rem;">
  <div class="card-body">
<form method="post" id ="form1" action="index.php?page=report">
     <table border="0" align="center" >
     <?php 
        ?> 
            
            <tr>
          <th>ปีการศึกษา</th>
          <th>ภาคเรียน</th>
          <th>ระบบการศึกษา</th>
        <tr>
          <td><input type="text" class="form-control" name="year" style="width:180px; height:38px;" required></td>
          <td><input type="text" class="form-control" name="term" style="width:180px; height:38px;" required></td>
          <td><select name="system" style="width:180px; height:38px;" required>
                <option value="" selected>-- เลือก --</option>
                <option value="เดิม">ระบบเดิม</option>
                <option value="AEC">ระบบAEC</option>
              </select></td>
   <td><button id="btn_search" type="submit" class="btn btn-outline-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;ค้นหา</button>
            
          
              </td>
        


        </table></form><br>
 <?php

require("connect_database.php");

if(!(empty($_POST['year']) && empty($_POST['term']) && empty($_POST['system'])))
{
  $year = $_POST['year'];
$term = $_POST['term'];
$system = $_POST['system'];

  

$sql = "SELECT status from sdu where status like '1' and year like '$year' and term like '$term' and system like '$system' ";
$result = mysqli_query($conn, $sql);
$num1 = mysqli_num_rows($result);


$sql2 = "SELECT status from sdu where status like '2' and year like '$year' and term like '$term' and system like '$system'";
$result2 = mysqli_query($conn, $sql2);
$num2 = mysqli_num_rows($result2);

$sql3 = "SELECT status from sdu where status like '3' and year like '$year' and term like '$term' and system like '$system'";
$result3 = mysqli_query($conn, $sql3);
$num3 = mysqli_num_rows($result3);

$sql0 = "SELECT status from sdu where status like '0' and year like '$year' and term like '$term' and system like '$system'";
$result0 = mysqli_query($conn, $sql0);
$num0 = mysqli_num_rows($result0);

$sql_all = "SELECT status from sdu where year like '$year' and term like '$term' and system like '$system'";
$result_all = mysqli_query($conn, $sql_all);
$num_all = mysqli_num_rows($result_all);

?>
  <h4>ผลการค้นหา ปีการศึกษา : <?php print $year;?> เทอม : <?php print $term;?> ระบบ : <?php print $system;?></h3>
    <table border="0" class="table" style="width: 70%">
 <tr><th>สถานะ</th><th class="text-center">จำนวน</th><th class="text-center">จำนวนทั้งหมด</th><th class="text-center"></th></tr>
     <?php 
        
            print "<tr scope='row'><td>ส่ง สวท. </td> <td align='center' >".$num1."</td><td align='center'>".$num_all."</td></td>
            <td align='center'><a href = 'index.php?page=show_from_report&year=".$year."&term=".$term."&system=".$system."&status=1&num=".$num1."' target='_blank'><button class='btn btn-info btn-sm'>แสดงข้อมูล</button></a></td></tr>";

            print "<tr scope='row'><td>สวท.รับเอกสาร <td align='center'>".$num2."</td><td align='center'>".$num_all."</td>
            <td align='center'><a href = 'index.php?page=show_from_report&year=".$year."&term=".$term."&system=".$system."&status=2&num=".$num2."' target='_blank'><button class='btn btn-info btn-sm'>แสดงข้อมูล</button></a></td></tr>";

            print "<tr scope='row'><td>สวท.ส่งคืน <td align='center'> ".$num3."</td><td align='center'>".$num_all."</td>
            <td align='center'><a href = 'index.php?page=show_from_report&year=".$year."&term=".$term."&system=".$system."&status=3&num=".$num3."' target='_blank'><button class='btn btn-info btn-sm'>แสดงข้อมูล</button></a></td></tr>"; 

            print "<tr scope='row'><td>ยังไม่ระบุ <td align='center'> ".$num0."</td><td align='center'>".$num_all."</td>
            <td align='center'><a href = 'index.php?page=show_from_report&year=".$year."&term=".$term."&system=".$system."&status=0&num=".$num0."' target='_blank'><button class='btn btn-info btn-sm'>แสดงข้อมูล</button></a></td></tr>"; 
        ?> 
</table><br>
<?php
}
?>
  </div>
</div>


