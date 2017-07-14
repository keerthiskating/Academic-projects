<?php
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
	$ssn= $_POST['ssn'];
	$address= $_POST['address'];
	$phone= $_POST['phone'];
	
    $con = mysqli_connect('localhost','root','root','librarymng');
	
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();		
    }
	
    if ($fname && $lname && $ssn && $phone)
    {
        $insert = "INSERT INTO borrower (ssn,fname,lname,address,phone) VALUES ('$ssn','$fname','$lname','$address','$phone')";
		$check_ssn = mysqli_query($con,"SELECT * FROM borrower Where ssn = '".$ssn."'");
		
		if($check_ssn->num_rows > 0)
        {
			echo "<script type='text/javascript'>
			alert('User with provided SSN already exists !');			
			location.replace('create_borrower.html');
			</script>";
        }	       
        else if(mysqli_query($con, $insert))
        {
			$cardno = mysqli_query($con,"SELECT * FROM borrower Where ssn = '".$ssn."'");
			$row = mysqli_fetch_array($cardno);
			$assigned_cardno = $row['card_id'];
			echo "<script type='text/javascript'>
			alert('User Successfully created with Card number :' + $assigned_cardno);			
			location.replace('library.html');
			</script>";
		/*	echo "$('.message').text('User Successfully created with Card number :' + $assigned_cardno !')";*/
		}
	}
    else
    {		        
		echo "<script type='text/javascript'>
		alert('Please fill out all the required fields');
		location.replace('create_borrower.html');
		</script>";
		
		/*echo "<script type='text/javascript'>
		$('.message').val('Please fill out all the required fields !')
		</script>";*/
    }
	mysqli_close($con);
?>