<?php

	include('test.php');

	// write query for all books
  $Borrower_ID = $_GET['Borrower_ID'];
	$Bar_Code = $_GET['Bar_Code'];
	$Borrowed_From = $_GET['Borrowed_From'];
	$Borrowed_To = $_GET['Borrowed_To'];

	$sql = "UPDATE book_loan SET Borrowed_To = '{$Borrowed_To}' WHERE Borrower_ID = '{$Borrower_ID}' AND Bar_Code = '{$Bar_Code}' AND Borrowed_From = '{$Borrowed_From}'";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
 header('Location: member.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
