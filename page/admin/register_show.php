<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>register</title>
</head>

<center>
<body>
<br>
<div class="col-sm-6">
  <div class="card w-70">
    <div class="card-body">
    <div class="card-title">
      <br><h2>ลงทะเบียนผู้เข้าใช้ระบบใหม่</h2>
    </div>


            <?php
                $txtusername =$_GET ['username'] ; 
                require('connect_database.php');
                // $serverName = "localhost";
                // $userName = "root";
                // $userPassword = "12345678";
                // $dbName = "regis_project";
                
                // $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
                $sql= "SELECT * from user where username like '$txtusername'";
                
                $query = mysqli_query($conn,$sql);
                $objResult = mysqli_fetch_array($query);
                if(!$objResult)
                {
                        print "ไม่มี";
                } 
                    else {
                    $rs = $objResult;
                    print"<table border ='1' width='50%' class='table table-bordered'>";
                    print "<tr><th width='50%'>ชื่อผู้ใช้งาน</th><td>";  print $rs['username'];  print"</td></tr>"; 
                    print "<tr><th>รหัสผ่าน</th><td>";  print $rs['password'];  print"</td></tr>"; 
                    print "<tr><th>คำนำหน้า</th><td>";   print $rs['font_name']; print"</td></tr>"; 
                    print "<tr><th>ชื่อจริง</th><td>";        print $rs['name'];      print"</td></tr>"; 
                    print "<tr><th>นามสกุล</th><td>";    print $rs['surname'];   print"</td></tr>"; 
                    print "<tr><th>แผนก</th><td>";      print $rs['department']; print"</td></tr>"; 
                    print "<tr><th>สถานะ</th><td>";      print $rs['status'];    print"</td></tr>"; 
                    print "</table><br>";
                    print "<tr><td></td><td><a href='home_admin.php?page=register'>";
                    print "<input type='button' class='btn btn-info' value='BACK'></a></td></tr>";
                
                    
                        }
                        mysqli_close($conn);
            ?>
</div>
</div>
</div>
<br><br>
</body>
</center>
</html>
