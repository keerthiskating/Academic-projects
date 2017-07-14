<?php
	$con = mysqli_connect('localhost','root','root','librarymng');
	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }	
		
    $update_fine = mysqli_query($con,"UPDATE fines AS F
									  INNER JOIN
										book_loans AS B ON F.loan_id = B.loan_id 
									  SET 
										F.fine_amt = (datediff(curdate(), B.due_date) * 0.25)
									  WHERE
										B.due_date < CURDATE() AND F.paid = 'N'");
	if($update_fine)
	{
		//echo "SUCCESS";
	}
	mysqli_close($con);
?>