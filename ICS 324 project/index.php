<?php

	include('test.php');

	// write query for all pizzas
  $ID = $_GET['ID'];
	$sql = 'SELECT People_Type FROM library_people WHERE People_ID = ' . $ID;

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$people = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if($people[0]['People_Type'] == 1){
  header('Location: librarian.php');
  }elseif($people[0]['People_Type'] == 2){
  header('Location: member.php');
}else{
  echo "Enter a valid ID number";
}

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>
