<link rel="stylesheet" href="css/glyphicon.css">

<style>

.dropdown:hover>.dropdown-menu {
  display: block;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4169E1;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php $font_color = "color:white"; ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" style= <?php print $font_color; ?>>หน้าหลัก<span class="sr-only">(current)</span></a>
                    </li> 

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuSystem" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style= <?php print $font_color; ?>>ตรวจสอบสถานะ มสด. 6</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuSystem">
                            <a class="dropdown-item" href="index.php?page=original">ระบบเดิม</a>
                            <a class="dropdown-item" href="index.php?page=aec">ระบบ AEC</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <!--onclick = "showdetail();" data-toggle="modal" data-target="#myModal" -->
                        <a class="nav-link"  href="index.php?page=report"  style= <?php print $font_color; ?>>รายงานสรุปผลสถานะ</a>
                    </li>
                    
                </ul>

                
                   <a href="index.php?page=login"> <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                            
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true" style= <?php print $font_color; ?>></span>
                            <font color="white">
                            เข้าสู่ระบบ</font>
                            
                    </button></a>
                
                
                

            </div>
            </nav>
