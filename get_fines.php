<?php
	$con = mysqli_connect('localhost','root','root','librarymng');	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }		
    $get_fines = mysqli_query($con,"SELECT 
										sum(fine_amt) as fines_sum,B.card_id as card_num,BW.fname as fname, BW.lname as lname
									FROM 
										fines F,book_loans B,borrower BW
									WHERE 
										F.loan_id = B.loan_id and bw.card_id = B.card_id and F.paid = 'N' 
									GROUP BY 
										b.card_id;");
	
	echo "<tr>
			<th>Card Number</th>
			<th>Name</th>
			<th>Fine Amount (in $)</th>
			</tr>
	";	
	while ($row = mysqli_fetch_assoc($get_fines)) {
	echo "<tr><td>" . $row["card_num"]. "</td><td>" . $row["fname"] . " " . $row["lname"]. "</td><td>" . 
	$row["fines_sum"]. "</td><tr>";
    }
	mysqli_close($con);
?>