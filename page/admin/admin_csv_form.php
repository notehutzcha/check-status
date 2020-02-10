<html>
<head>

</head>
<script>
	function check(frm)
	{
		if(frm.fileCSV.value=="")
		{
			alert('เลือกไฟล์ที่ต้องการ Upload');
			return false;
		}
		else
		{
			var result = document.getElementById('loading');
			result.innerHTML = "<img src=img/loading.gif>";
		}
		return true;
	}
	</script>
	  
<body>


<center><br>
<form action="home_admin.php?page=csv_upload" method="post" enctype="multipart/form-data" name="form1" onsubmit="return check(this)">
<div class="col-md-6">	      
<div class="input-group">
  <div class="custom-file">
  <input name="fileCSV" type="file" id="fileCSV">
    <label class="custom-file-label" for="fileCSV">Choose file *CSV</label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-outline-primary" name="btnSubmit" type="submit" id="btnSubmit">Upload</button>
  </div>
</div>
</div>
</form>
 <script>
            $('#fileCSV').on('change',function(){
                //get the file name
                var fileName = document.getElementById("fileCSV").files[0].name; 
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
<p><span id = "loading"></span></p>      
</center>	      



<!-- <center><br>
<form action="home_admin.php?page=csv_upload" method="post" enctype="multipart/form-data" name="form1" onsubmit="return check(this)">
  <input name="fileCSV" type="file" id="fileCSV">
  <button type="submit"  name="btnSubmit" id="btnSubmit" class="btn btn-primary btn-sm">เพิ่มข้อมูลจากไฟล์ CSV</button>
</form>
<p><span id = "loading"></span></p>
</center> -->

</body>
</html>