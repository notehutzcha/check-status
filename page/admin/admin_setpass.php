<HTML>

<!-- สคริปเช็คการกรอกรหัสผ่าน -->
<script>
function validatePassword() {
var newPassword,confirmPassword,output = true;


newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = " * กรุณากรอกรหัสผ่านใหม่";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = " * กรุณากรอกยืนยันรหัสผ่าน";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = " * รหัสผ่านไม่ตรงกัน";
output = false;
} 	
return output;
}
</script>



<center><br>
<div class="col-sm-6">
  <div class="card w-100">
    <div class="card-body">
<br>


<?php
//แสดงค้นหา

if(!empty($_GET['username']))
{
	$txtsearch = $_GET['username'];
	require("connect_database.php");
	$sql="SELECT * from user where username like '$txtsearch'" ;
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query))
	{
		$row=mysqli_fetch_array($query);
?>
		
		<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' style="width : 98%">
			<thead>

				<tr align="center"><br>
                    <th width="15%">ชื่อผู้ใช้งาน</th>
					<!-- <th>คำนำหน้า</th> -->
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>กรอกรหัสผ่านใหม่</th>
                    <th>ยืนยันรหัสผ่าน</th>
				</tr>
			</thead>	
			<?php $username = $row["username"]; ?>
                    <td><div align="center"><?= $username;?></div></td> 
					<!-- <td><div align="center"><?= $row["font_name"];?></div></td> -->
					<td><div align="center"><?= $row["name"]; ?></div></td>
					<td><div align="center"><?= $row["surname"]; ?></div></td>
                    
                <!-- กรอกข้อมูลเปลี่ยนรหัสผ่าน -->
                    <form  class="form-control"name="frmChange" method="post" action="home_admin.php?page=set_save&username=<?php print $username; ?>" onSubmit="return validatePassword()">
                    <td><div align="center"><input type="password" name="newPassword" id="newPassword" style="width: 140px; height: 30px;" class="form-control" required></div></td>
                    <td><div align="center"><input type="password" name="confirmPassword" id="confirmPassword" style="width: 140px; height: 30px;" class="form-control" required></div></td>
               
        </table>
                    
                    <button type="submit" class="btn btn-primary">บันทึกรหัสผ่าน</button>
 

<?php
	 } 	
	 else{
	 	print "<h2>ไม่พบผู้ใช้งานระบบ</h2>";
	 }
}
?>
</div>
</div>
</div>
</center>
</HTML>

