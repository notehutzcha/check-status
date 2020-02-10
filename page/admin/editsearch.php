<html>

<?php
$username = $_GET['username'];

require("connect_database.php") ;
$sql = "SELECT * FROM user WHERE username like '$username'";
$query = mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($query);
?>
<body>
<br><br><br>
<center>
<div class="col-sm-6">
  <div class="card w-70">
    <div class="card-body">
        <br>
        <form method="post" action="home_admin.php?page=edit_save&username=<?php print $username; ?>">
        <table class="table table-bordered table-striped table-sm table-responsive-sm" border = '0' style="width: 50%">
        <tr align="center">
            <thead>
            <th>คำนำหน้า</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>แผนก</th>
            </thead>
        </tr>
       
            <?php $rs["username"]; ?>
            <?php $rs["password"]; ?>
            <td><input type="text" name="font_name" value="<?=$rs["font_name"];?>" style="width: 120px;" class="form-control" 
                required></td>
            <td><input type="text" name="name" value="<?= $rs["name"];?>" style="width: 120px;" class="form-control" required></td>
            <td><input type="text" name="surname" value="<?=$rs["surname"];?>" style="width: 120px;" class="form-control" required></td>
            <td><select type="text" name="department" style="width: 180px;" class="form-control">      
                            <?php 
                            $array_name = array("งานอำนวยการ","งานทะเบียนนักศึกษา","งานส่งเสริมวิชาการ");
                            $i=0;
                            while($i<count($array_name)){
                                if($rs["department"] == $array_name[$i])
                                {
                                print "<option value".$array_name[$i]." selected>".$array_name[$i]."</option>";
                                } 
                                else{
                                print "<option value".$array_name[$i].">".$array_name[$i]."</option>";
                                }
                                $i++;
                            }
                            
                            ?> 
                            
                </select>
            </td>
        </table>

      	
        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </div>
    </div>
</div>   
        
        </form>
            </html>
