<?php

	include('test.php');

	// write query for all books
  $People_ID = $_GET['People_ID'];
	$sql = "DELETE FROM library_people WHERE People_ID = '{$People_ID}'";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
header('Location: librarian.php');
	// fetch the resulting rows as an array
	$People = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
