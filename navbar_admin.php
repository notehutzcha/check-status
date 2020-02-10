            <link rel="stylesheet" href="css/glyphicon.css">
            <style>

.dropdown:hover>.dropdown-menu {
  display: block;
}
</style>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4169E1; " >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
                    <?php $font_color = "color:white"; ?>
                
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <a class="nav-link" href="home_admin.php?page=pdf" style= <?php print $font_color; ?>>หน้าหลัก<span class="sr-only">(current)</span></a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuSystem" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style= <?php print $font_color; ?>>ตรวจสอบสถานะ มสด. 6</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuSystem">
                            <a class="dropdown-item" href="home_admin.php?page=original">ระบบเดิม</a>
                            <a class="dropdown-item" href="home_admin.php?page=aec">ระบบ AEC</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style= <?php print $font_color; ?>>
                        จัดการข้อมูล
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="home_admin.php?page=register">ลงทะเบียนผู้ใช้งาน</a>
                            <a class="dropdown-item" href="home_admin.php?page=search">แก้ไขข้อมูลผู้ใช้งาน</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home_admin.php?page=csv_form" style= <?php print $font_color; ?>>อัปโหลดไฟล์CSV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home_admin.php?page=check_log" style= <?php print $font_color; ?>>ตรวจสอบการเปลี่ยนแปลงสถานะ</a>
                    </li>
                   
                </ul>
                
                <form class="form-inline my-2 my-lg-0" action="logout.php" style= <?php print $font_color; ?>>
                    <span >ชื่อผู้ใช้งาน : </span> &nbsp
                    <?php print $_SESSION['ss_username']; ?> &nbsp
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                            <a style= <?php print $font_color; ?>>
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true" style= <?php print $font_color; ?>></span>
                            ออกจากระบบ
                            </a>
                    </button>
                </form>
            </div>
            </nav>