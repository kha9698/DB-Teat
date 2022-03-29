<?php

	include('test.php');

	// write query for all books
  $ISBN_Code = $_GET['ISBN_Code'];
  $Book_Title = $_GET['Book_Title'];
  $Book_Language = $_GET['Book_Language'];
  $No_of_Copies = $_GET['No_of_Copies'];
  $Subject_ID = $_GET['Subject_ID'];
  $Publication_Year = $_GET['Publication_Year'];
  $Is_Available = $_GET['Is_Available'];

	$sql = "UPDATE book SET ISBN_Code = '{$ISBN_Code}', Book_Title = '{$Book_Title}', Book_Language = '{$Book_Language}', No_of_Copies = '{$No_of_Copies}', Subject_ID = '{$Subject_ID}', Publication_Year = '{$Publication_Year}', Is_Available = '{$Is_Available}' WHERE ISBN_Code = '{$ISBN_Code}' ";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: librarian.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);





?>
