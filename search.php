<?php

    $isbn = $_POST['isbn'];
    $authors = $_POST['authors'];    
	$book_title = $_POST['book_title'];    	

    $con = mysqli_connect('localhost','root','root','librarymng');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

/*    if ($isbn == " " && $gender == "gdef") {
    $result = mysqli_query($con,"SELECT * FROM babynames ORDER BY year,gender,ranking");
    while ($row = mysqli_fetch_array($result)) {
	echo "<tr><td>" . $row["name"]."</td><td>" . $row["year"] . "</td><td>" . $row["ranking"] . "</td><td>" . $row["gender"] . "</td><tr>";
    }}

    elseif ($year == "ydef") {
    $result = mysqli_query($con,"SELECT * FROM babynames WHERE gender='".$gender."' ORDER BY gender");
    while ($row = mysqli_fetch_array($result)) {
	echo "<tr><td>" . $row["name"] . "</td><td>" . $row["year"] . "</td><td>" . $row["ranking"] . "</td><td>" . $row["gender"] . "</td><tdr>";
    }}

    elseif ($gender == "gdef") {
    $result = mysqli_query($con,"SELECT * FROM babynames WHERE year='".$year."' ORDER BY gender, ranking");
    while ($row = mysqli_fetch_array($result)) {
	echo "<tr><td>".$row["name"]."</td><td>".$row["year"]."</td><td>".$row["ranking"]."</td><td>".$row["gender"]."</td><tr>";
    }}

    else  {
    $result = mysqli_query($con,"SELECT * FROM babynames WHERE year='".$year."' and gender='".$gender."' ORDER BY year,ranking");
    while ($row = mysqli_fetch_array($result)) {
	echo "<tr><td>".$row["name"]."</td><td>".$row["year"]."</td><td>".$row["ranking"]."</td><td>".$row["gender"]."</td><tr>";
    }}*/
	mysqli_close($con);
?>