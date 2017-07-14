<?php

	$con = mysqli_connect('localhost','root','root','librarymng');
	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	
	$isbn = $_GET['isbn']; 
	echo $isbn;
	$a_json = array();

	$result = mysqli_query($con,"SELECT * FROM book WHERE isbn LIKE '".$isbn."%' LIMIT 10");

	while ($row = mysqli_fetch_array($result)) {
	array_push($a_json, $row["isbn"]);		
    }
	//echo json_encode($a_json);
		
	mysqli_close($con);
?>