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
<form name="frmChange" method="post" action="pass_save.php" onSubmit="return validatePassword()">
<div style="width:500px;">
<div >
    <?php if(isset($message)) { echo $message; } ?></div>

<table border="0" cellpadding="10" cellspacing="0" width="600" align="center" class="tblSaveForm">
<tr >
<td colspan="2" >Change Password</td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>