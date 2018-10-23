<?php
	$con = mysqli_connect("localhost","peter","abc123");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}else{
		
		mysqli_query("pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com","root","acuteangle123");
	}
	
	$sql="select * from aa_register";
	

?>