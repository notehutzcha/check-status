<HTML>


	<link rel="stylesheet" href="css/glyphicon.css">

<body>
<center><br>
<div class="col-sm-10">
  <div class="card w-70">
    <div class="card-body">
	<div class="card-title">
      <br><h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
    </div>
<br>


<form  class="form-inline justify-content-center" method="post" action="home_admin.php?page=search" onsubmit="return checksubmit(this)" name="frminput">
	ค้นหาข้อมูลผู้ใช้งาน &nbsp;<input type="text" name="txtsearch"  class="form-control" style="width: 380px; height: 38px;">&nbsp;
	<button type="submit" value="Search" class="btn btn-outline-info">Search</button>
</form>


<?php
//แสดงค้นหา

if(isset($_POST['txtsearch']))
{
	require("connect_database.php");
	$txtsearch = $_POST['txtsearch'];
	
	if($_POST['txtsearch'] != "")
	{
		$sql = "SELECT * from user where username like '%$txtsearch%' or name like '%$txtsearch%' or surname like '%$txtsearch%'" ;
    	$query = mysqli_query($conn,$sql);
	}
	else
	{
		$sql = "SELECT * from user" ;
    	$query = mysqli_query($conn,$sql);
	}
    if(mysqli_num_rows($query))
	{
		?>
		<br>
		<table class="table table-bordered table-striped table-sm table-responsive-sm" border = '1' style="width : 98%">
			<thead>
				<tr align="center">
					<th>ลำดับ</th>
					<th>รหัสพนักงาน</th>
					<th>สิทธิการใช้งาน</th>
					<th>คำนำหน้า</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>แผนก</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
					<th>ตั้งรหัสใหม่</th>
				</tr>
			</thead>	
		<?php
		$i=1;
		while($row=mysqli_fetch_array($query))
		{

					$username = $row["username"];
?>
					<td><div align="center"><?= $i;?></div></td>
					<td><div align="center"><?= $username;?></div></td>
					<td><div align="center"><?= $row["status"];?></div></td>
					<td><div align="center"><?= $row["font_name"];?></div></td>
					<td><div align="center"><?= $row["name"]; ?></div></td>
					<td><div align="center"><?= $row["surname"]; ?></div></td>
					<td><div align="center"><?= $row["department"]; ?></div></td>
                    
					<!--แก้ไข-->
                    <td><div align="center">	
							<a href="home_admin.php?page=edit_user&username=<?php print $row["username"];?>">
							<span class="glyphicon glyphicon-edit" aria-hidden="true">
							</span>
							</a>
						</div>
					</td>        
					<!--ลบ-->
					<?php if($_SESSION["ss_username"] == $username )
					{
						?>
							<td><div align="center">
							<a href="#" onclick="return alert('ไม่สามารถลบตัวเองได้');">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</div>
					</td>
						<?php
					}
					else
					{
						?>
							 <td><div align="center">
							<a href="home_admin.php?page=delete&username=<?php print $row["username"];?>"onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก');">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</div>
					</td>
						<?php
					} 
					?>                 
                   
					
					<td><div align="center">
							<a href="home_admin.php?page=setpass&username=<?php print $row["username"];?>">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a>
						</div>
					</td></tr>
				<?php $i++; } ?>
               
        </table>
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





</body>
</HTML>

