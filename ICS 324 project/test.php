<?php

	// connect to the database
	$conn = mysqli_connect('localhost', 'Abdulrahman', '12345678', 'ics 324 project');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
