<?php

    //$array=json_decode($_POST['arr']);	
	$arr    = $_POST["arr"];
	//$arr    = json_decode("$arr", true);
	//echo $arr[0];
    $con = mysqli_connect('localhost','root','root','librarymng');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	
    /*$check_in = mysqli_query($con,"SELECT F.loan_id as l_id, B.isbn as isbn, B.card_id as c_id, F.fine_amt as f_amt FROM fines AS F INNER JOIN book_loans AS B ON F.loan_id = B.loan_id WHERE B.loan_id = '".$arr[0]."'");*/
	
	$delete ="DELETE FROM fines WHERE";
	$delete1 ="DELETE FROM book_loans WHERE";

    /*while ($row = mysqli_fetch_array($check_in)) 
	{*/	
		//echo "<p>rows retrieved</p>";
	/*if ($row["f_amt"] > 0) 
	{*/		
		foreach ($arr as $key => $value) {
			if($key!=0){
				$delete=$delete.' or ';
				$delete1=$delete1.' or ';
			}
			$delete=$delete. ' loan_id = '.$value;
			$delete1=$delete1. ' loan_id = '.$value;
		}
		//echo $delete;
		if(mysqli_query($con,$delete)){
			if(mysqli_query($con,$delete1)){
			echo "Book checked in successfully !";	
			}
			
	}
	/*}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("No pending fines")';
		echo '</script>';
	}
	}*/
	mysqli_close($con);
?>