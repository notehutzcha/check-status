  <?php

require("connect_database.php");

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

$sql_all = "SELECT status from sdu where year like '$year' and term like '$term' and system like '$system'";
$result_all = mysqli_query($conn, $sql_all);
$num_all = mysqli_num_rows($result_all);

?>
<table border="0">
 <tr><th>สถานะ</th><th class="text-center">จำนวน</th><th class="text-center">จำนวนทั้งหมด</th></tr>
     <?php 
     		
            print "<tr><td>ส่ง สวท. </td> <td align='center' >".$num1."</td><td align='center'>".$num_all."</td></tr>";
            print "<tr><td>สวท.รับเอกสาร <td align='center'>".$num2."</td><td align='center'>".$num_all."</td></tr>";
            print "<tr><td>สวท.ส่งคืน <td align='center'> ".$num3."</td><td align='center'>".$num_all."</td></tr>"; 
        ?> 
</table>
