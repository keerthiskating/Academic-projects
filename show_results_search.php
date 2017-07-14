<?php
    $isbn = $_POST['isbn'];
	$header="<tr>	
		<th>ISBN</th>
		<th>Book Title</th>
		<th>Author(s)</th>
		<th>Book availability</th>
	</tr>";
	echo $header;
    $con = mysqli_connect('localhost','root','root','librarymng');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if ($isbn) 
	{
		$result = mysqli_query($con,"SELECT DISTINCT(b.isbn) as isbn,b.title as title FROM book b, authors a, book_authors ba where b.isbn=ba.isbn and a.author_id=ba.author_id and ( b.title like '%".$isbn."%' or a.name like '%".$isbn."%' or b.isbn like '%".$isbn."%') LIMIT 10");				
		
		while ($row = mysqli_fetch_array($result)) {		
			$result1 = mysqli_query($con,"select name from authors where author_id in (select author_id from book_authors where isbn='".$row['isbn']."')");
			$name="";
			$count=0;
			while($row1=mysqli_fetch_array($result1)){
				if($count==0){
					$name=$row1['name'];
				}else{
					$name=$name.', '.$row1['name'];
				}
				$count+=1;
			}
			$avail = mysqli_query($con, "SELECT * FROM book_loans WHERE isbn = '".$row['isbn']."'");
			
			if($avail->num_rows == 1) {
			echo "<tr><td>". $row["isbn"] . "</td><td>" . $row["title"] . "</td><td>" . $name . "</td><td>" . "N" . "</td><tr>";
			} else {
			echo "<tr><td>". $row["isbn"] . "</td><td>" . $row["title"] . "</td><td>" . $name . "</td><td>" . "Y" . "</td><tr>";
			}				
		}	
	}
  
	mysqli_close($con);
?>