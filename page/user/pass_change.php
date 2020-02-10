<?php 
	$username = $_SESSION['ss_username'];
?>

<html>
<head>
            <title>Change Password</title>


            <script>
            function validatePassword() {
            var currentPassword,newPassword,confirmPassword,output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if(!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML  =" * กรุณากรอกรหัสผ่าน";
            output = false;
            }
            else if(!newPassword.value) {
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
            document.getElementById("confirmPassword").innerHTML = " * password ไม่ตรงกัน";
            output = false;
            } 	
            return output;
            }
            </script>
</head>


<body>
<center><br>


<div class="col-sm-6">
  <div class="card w-100">
    <div class="card-body">
    <div class="card-title">
      <br><h2>เปลี่ยนรหัสผ่านใหม่</h2>
    </div>       
    <form name="frmChange" method="post" action="home_user.php?page=passsave" onSubmit="return validatePassword()">
                <div class="form-group row">
                    <label for="currentPassword" class="col-md-4 col-form-label text-md-right">รหัสผ่านเดิม</label>
                    <div class="col-md-6">
                        <input type="password" id="currentPassword" class="form-control" name="currentPassword" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="newPassword" class="col-md-4 col-form-label text-md-right">รหัสผ่านใหม่</label>
                    <div class="col-md-6">
                        <input type="password" id="newPassword" class="form-control" name="newPassword" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>
                    <div class="col-md-6">
                        <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 offset-md-4">
                        <button type="submit" value="submit"  name="submit" class="btn btn-primary">
                         บันทึก
                        </button>
                    </div>
                </div>
        </form>                
    </div>        
  </div>           
</div>
<br><br></center>
</body></html>