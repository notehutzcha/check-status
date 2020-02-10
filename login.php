
  <!-- CONTAINER -->

    <div class="text-center">
    <div class="jumbotron">
    <!-- <div class="rerun"><a href="#" onclick = "showdetail();" data-toggle="modal" data-target="#myModal">ดูรายงาน</a></div> -->
        <div class="row justify-content-center" style="">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-info">LOGIN</h3><br>
                        <form  method="post" action="check_login.php">
                            <div class="form-group">
                                <input type="text" class="form-control"  required="required"  placeholder="Enter Username"name="txtUsername"/> 
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  required="required" placeholder="Enter Password" name="txtPassword"/>
                            </div>
                            <div class="help-block text-right"><a href="#" onclick = "contact();" data-toggle="modal" data-target="#myModalContact">ลืมรหัสผ่าน?</a></div>
                            <button type="submit" id="sendlogin" class="btn btn-primary">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    </div>
 
  

   <!-- MODAL CONTACT ADMIN -->
  <div class="modal fade" id="myModalContact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ติดต่อผู้ดูแลระบบ</h4>
        </div>
        
        <div class="modal-body">
          <table align="center"><tr><td>นายบุญธรรม สังขะเสน</td></tr>
                              <tr><td><center>ติดต่อเบอร์ 5235</center></td></tr></table>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- END MODAL -->
