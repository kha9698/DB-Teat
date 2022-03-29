<?php

	include('test.php');

	// write query for all books
  $Borrower_ID = $_GET['Borrower_ID'];
	$Bar_Code = $_GET['Bar_Code'];

	$sql = "DELETE FROM book_loan WHERE Borrower_ID = '{$Borrower_ID}' AND Bar_Code = '{$Bar_Code}'";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: member.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
