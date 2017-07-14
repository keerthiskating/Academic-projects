<?php

    $isbn = $_POST['isbn'];
    $card_no = $_POST['card_no'];    
    $borrower_name = $_POST['borrower_name'];	
	$header="<tr>
		<th></th>
		<th>Loan ID</th>
		<th>ISBN</th>
		<th>Card No</th>
		<th>Fine Amt</th>
	</tr>";
	echo $header;
    $con = mysqli_connect('localhost','root','root','librarymng');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($isbn) {
    $result = mysqli_query($con,"SELECT 
									F.loan_id as l_id, B.isbn as isbn, B.card_id as c_id, F.fine_amt as f_amt
								 FROM
								    fines AS F
								 INNER JOIN
									book_loans AS B ON F.loan_id = B.loan_id
								 WHERE
									B.isbn = '".$isbn."'");
    while ($row = mysqli_fetch_array($result)) {
	$html1 = "<td class='cb'><input type='checkbox' value='yes' ></td>";
	echo "<tr>" . $html1 . "<td>" . $row["l_id"] . "</td><td>" . $row["isbn"] . "</td><td>" . $row["c_id"] . "</td><td>" . $row["f_amt"] . "</td><tr>";
    }}
	
    elseif ($card_no) {
    $result = mysqli_query($con,"SELECT 
									F.loan_id as l_id, B.isbn as isbn, B.card_id as c_id, F.fine_amt as f_amt
								FROM
									fines AS F
								INNER JOIN
									book_loans AS B ON F.loan_id = B.loan_id
								WHERE
									B.card_id = '".$card_no."'");
    while ($row = mysqli_fetch_array($result)) {
	$html1 = "<td class='cb'><input type='checkbox' value='yes' ></td>";
	echo "<tr>" . $html1 . "<td>" . $row["l_id"] . "</td><td>" . $row["isbn"] . "</td><td>" . $row["c_id"] . "</td><td>" . $row["f_amt"] . "</td><tr>";
    }}

    elseif ($borrower_name) {
    $result = mysqli_query($con,"SELECT BL.loan_id as l_id, BL.isbn as isbn, BL.card_id as c_id, F.fine_amt as f_amt FROM librarymng.book_loans AS BL INNER JOIN borrower as B INNER JOIN fines as F on BL.loan_id = F.loan_id and B.card_id = BL.card_id WHERE B.fname LIKE '%".$borrower_name."%' or B.lname LIKE '%".$borrower_name."%'");
    while ($row = mysqli_fetch_array($result)) {
		$html1 = "<td class='cb'><input type='checkbox' value='yes' ></td>";
		echo "<tr>" . $html1 . "<td>" . $row["l_id"] . "</td><td>" . $row["isbn"] . "</td><td>" . $row["c_id"] . "</td><td>" . $row["f_amt"] . "</td><tr>";
    }}
	mysqli_close($con);
?>