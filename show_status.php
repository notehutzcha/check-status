<?php

	require("connect_database.php");

	$sql = "SELECT status from sdu where status like '1'";
	$result = mysqli_query($conn, $sql);
	$num1 = mysqli_num_rows($result);

	$sql2 = "SELECT status from sdu where status like '1'";
	$result2 = mysqli_query($conn, $sql2);
	$num2 = mysqli_num_rows($result2);

	$sql3 = "SELECT status from sdu where status like '1'";
	$result3 = mysqli_query($conn, $sql3);
	$num3 = mysqli_num_rows($result3);

	print "ส่ง สวท. : ".$num1."<br>
			สวท.รับเอกสาร :".$num2."<br>
			สวท.ส่งคืน : ".$num3;

?>