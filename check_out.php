<?php
	$con = mysqli_connect('localhost','root','root','librarymng');
	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }	
	
	$isbn = $_POST['isbn']; 
	$card_no = $_POST['card_no']; 	
	$Date =  date("Y-m-d");
	$d=strtotime("+2 week");
	$d1=date("Y-m-d", $d);
	
	if ($isbn && $card_no)
	{
		$result = mysqli_query($con,"SELECT * FROM book_loans Where isbn = '".$isbn."'");
		$check_if_valid_book = mysqli_query($con,"SELECT * FROM book Where isbn = '".$isbn."'");
		$count = mysqli_query($con,"SELECT count(card_id) as total FROM book_loans Where card_id = '".$card_no."'");
		$check_cardno = mysqli_query($con,"SELECT * FROM borrower Where card_id = '".$card_no."'");
		$insert = "INSERT INTO book_loans (isbn, card_id, date_out, due_date, date_in) VALUES ('$isbn', '$card_no', '$Date','$d1',NULL)";
		$data=mysqli_fetch_assoc($count);		
		
		if ($check_cardno->num_rows == 0)
		{
			echo "Card_no doesn't exist. Please create the card / provide a valid one";
		}
		
		else if ($result->num_rows > 0)
		{			
			echo "Book is already checked out";
		}
		
		else if ($check_if_valid_book->num_rows == 0)
		{			
			echo "Invalid ISBN";
		}		
			
		else if ($data['total']>=3)
		{
			echo "This user has already rented 3 books";
		}
		
		else
		{
			if(mysqli_query($con, $insert))
			{
				$get_loan_id = mysqli_query($con,"SELECT * from book_loans WHERE isbn = '".$isbn."'");
				$row = mysqli_fetch_array($get_loan_id);
				$insert_into_fines = "INSERT INTO fines (loan_id, fine_amt, paid) VALUES ('".$row["loan_id"]."',0, 'N')";
				if(mysqli_query($con, $insert_into_fines))
				{
					echo "Book checked out successfully";					
				}								
			}
		}
	}
	else
	{		
		echo "Please provide ISBN and Card_no";
	}		
	mysqli_close($con);
?>