<?php
	session_start();
	echo "entered delete page";
	if(isset($_SESSION['arr'])){
		$arr = $_SESSION['arr'];
		$sql = $_SESSION['sqlDel'];
		
	}

?>