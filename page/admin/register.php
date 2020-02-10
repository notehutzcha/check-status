<script type="text/javascript">
function autoTab2(obj){
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
   
        document.getElementById("demo").innerHTML = "ตัวอย่าง(1234-567)";
        var pattern=new String("____-___"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้     
        
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        var obj_l3=obj.value;

        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
</script>
<center>
<body>

<br>
<div class="col-sm-8">
  <div class="card w-70">
    <div class="card-body">
    <div class="card-title">
      <br><h2>ลงทะเบียน</h2>
    </div>

                              <form method="post" action="home_admin.php?page=register_save" name = "frmInput" onSubmit="return check(this)" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">รหัสพนักงาน</label>
                                    <div class="col-md-6">
                                        <!-- pattern="[0-9]{7,}" -->
                                        <input type="text" id="username" class="form-control" name="username" minlength="8" maxlength="8" placeholder="xxxx-xxx" onkeypress="autoTab2(this)" required> 
                                    </div>
                                    <div class="col-md-2">
                                        <div id="demo"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input type="text" id="password" class="form-control" name="password" required oninvalid="this.setCustomValidity('กรุณากรอก Password')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="font_name" class="col-md-4 col-form-label text-md-right">คำนำหน้า</label>
                                    <div class="col-md-6">
                                        <input type="text" id="font_name" class="form-control"  name="font_name" required oninvalid="this.setCustomValidity('กรุณากรอก คำนำหน้าชื่อ')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อจริง</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control"  name="name" required oninvalid="this.setCustomValidity('กรุณากรอก ชื่อ')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                                    <div class="col-md-6">
                                        <input type="text" id="surname" class="form-control" name="surname" required oninvalid="this.setCustomValidity('กรุณากรอก นามสกุล')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">แผนก</label>
                                    <div class="col-md-6">
                                    <select id="department" class="form-control" name="department" required oninvalid="this.setCustomValidity('กรุณาเลือก แผนก')" oninput="this.setCustomValidity('')">
                                        <option value=>-</option>
                                        <option value="งานอำนวยการ">งานอำนวยการ</option>
                                        <option value="งานทะเบียนนักศึกษา">งานทะเบียนนักศึกษา</option>
                                        <option value="งานส่งเสริมวิชาการ">งานส่งเสริมวิชาการ</option> 
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">สถานะ</label>
                                    <div class="col-md-6">
                                    <select id="status" class="form-control" name="status" required oninvalid="this.setCustomValidity('กรุณาเลือก สถานะ')" oninput="this.setCustomValidity('')">   
                                        <option value=>-</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>  
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 offset-md-4">
                                      <button type="submit" value="save" class="btn btn-primary">
                                      ลงทะเบียน
                                      </button>
                                </div>
                                
                            </form>



    </div>
  </div>
</div>
  <br>
  <br>
  
  
</body>
</center>
