<?php 
	if(!empty($_SESSION['ss_status'])){
		if($_SESSION['ss_status'] == "user")
		{
		?><center><embed src="user_tool.pdf" width="70%" height="100%" /><?php
		}
	if($_SESSION['ss_status'] == "admin")
		{
		?><center><embed src="admin_tool.pdf" width="70%" height="100%" /><?php
		}
	}
	else
	{
		?><center><embed src="user_tool.pdf" width="70%" height="100%" /><?php
		}
?>

