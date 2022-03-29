<?php

	include('test.php');

	// write query for all books
  $Borrower_ID = $_GET['Borrower_ID'];
  $Bar_Code = $_GET['Bar_Code'];
  $Borrowed_From = $_GET['Borrowed_From'];
  $Borrowed_To = $_GET['Borrowed_To'];
  $Actual_Return = $_GET['Actual_Return'];
  $Issued_by = $_GET['Issued_by'];
	echo $Borrower_ID;
	echo $Bar_Code;
	echo $Borrowed_From;
	echo $Borrowed_To;
	echo $Actual_Return;
	echo $Issued_by;

			$sql = "INSERT INTO book_loan(Borrower_ID, Bar_Code, Borrowed_From, Borrowed_To, Actual_Return, Issued_by) VALUES('{$Borrower_ID}','{$Bar_Code}','{$Borrowed_From}', '{$Borrowed_To}', '{$Actual_Return}', '{$Issued_by}')";


	 //get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: member.php');
	//fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
