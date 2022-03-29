<?php

	include('test.php');
	$errors = array('People_ID' => '', 'Book_Title' => '', 'Book_Language' => '', 'No_of_Copies' => '', 'Subject_ID' => '', 'Publication_Year' => '', 'Is_Available' => '');


	$People_ID = '';
	$errors = array('People_ID' => '');

	if(isset($_GET['submit'])){

		// check ISBN_Code
		if(empty($_GET['People_ID'])){
			$errors['People_ID'] = 'An People_ID is required';
		} else{
			$ISBN_Code = $_GET['People_ID'];
  			if(!preg_match('/^[1-9\s]+$/', $People_ID)){
  				$errors['People_ID'] = 'People_ID must be Numbers only';
			}
    }
	}








		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$People_ID = mysqli_real_escape_string($conn, $_GET['People_ID']);
}
			// create sql
			$sql = "INSERT INTO Book(ISBN_Code,Book_Title,Book_Language, No_of_Copies, Subject_ID, Publication_Year, Is_Available) VALUES('$ISBN_Code','$Book_Title','Book_Language', '$No_of_Copies', '$Subject_ID', '$Publication_Year', '$Is_Available')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: librarian.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}


?>

<!DOCTYPE html>
<html>

<head>
<title>Library system</title>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
  .brand{
    background: #cbb09c !important;
  }
  .brand-text{
    color: #cbb09c !important;
  }
  form{
    max-width: 460px;
    margin: 20px auto;
    padding: 20px;
  }
</style>
</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
  <div class="container">
    <a href="librarian.php" class="brand-logo brand-text">Librarian</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
      <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
    </ul>
  </div>
</nav>

	<section class="container grey-text">
		<h4 class="center">Delete a Member</h4>
		<form class="white" action="DeleteM.php" method="GET">
			<label>People_ID</label>
			<input type="text" name="People_ID" value="<?php echo htmlspecialchars($People_ID) ?>">
			<div class="red-text"><?php echo $errors['People_ID']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
