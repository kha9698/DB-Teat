<?php

	include('test.php');

	// write query for all books
  $ISBN_Code = $_GET['ISBN_Code'];
	$sql = "DELETE FROM book WHERE ISBN_Code = '{$ISBN_Code}'";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: librarian.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
