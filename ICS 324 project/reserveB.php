<?php

	include('test.php');

	// write query for all books
  $ISBN_Code = $_GET['ISBN_Code'];
  $Borrower_ID = $_GET['Borrower_ID'];
  $Reserve_Date = $_GET['Reserve_Date'];
  $Status = $_GET['Status'];

$sql = "INSERT INTO book_reserve(Borrower_ID, ISBN_Code, Reserve_Date, Status) VALUES('{$Borrower_ID}','{$ISBN_Code}','{$Reserve_Date}', '{$Status}')";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: member.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);





?>
