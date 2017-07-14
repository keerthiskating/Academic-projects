<?php

	$con = mysqli_connect('localhost','root','root','librarymng');
	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	if(isset($_POST['isbn'])){
		$isbn = $_POST['isbn'];
		$a_json = array();

		$result = mysqli_query($con,"SELECT b.isbn as isbn,b.title as title,a.name as name FROM book b, authors a, book_authors ba where b.isbn=ba.isbn and a.author_id=ba.author_id and ( b.title like '%".$isbn."%' or a.name like '%".$isbn."%' or b.isbn like '%".$isbn."%') LIMIT 10");
		while ($row = mysqli_fetch_array($result)) {
			array_push($a_json, ($row["isbn"].",".$row["title"].",".$row["name"]));		
		}
	
		echo implode(",", $a_json);
		mysqli_close($con);	
	}
	
?>