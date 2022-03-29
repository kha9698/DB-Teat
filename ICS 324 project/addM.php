<?php

	include('test.php');

	// write query for all books
  $People_ID = $_GET['People_ID'];
  $First_Name = $_GET['First_Name'];
  $Last_Name = $_GET['Last_Name'];
  $People_Type = $_GET['People_Type'];
  $Birth_Date = $_GET['Birth_Date'];
  $Sex = $_GET['Sex'];
  $Department = $_GET['Department'];
	$Contact_Number = $_GET['Contact_Number'];
  $Email = $_GET['Email'];
	$sql = "INSERT INTO library_people(People_ID, First_Name, Last_Name, People_Type, Birth_Date, Sex, Department, Contact_Number, Email) VALUES('{$People_ID}','{$First_Name}','{$Last_Name}', '{$People_Type}', '{$Birth_Date}', '{$Sex}', '{$Department}', '{$Contact_Number}', '{$Email}')";


	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
  header('Location: librarian.php');
	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);





?>
