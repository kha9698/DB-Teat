<?php

	include('test.php');
	$ISBN_Code = $Book_Title = $Book_Language = $No_of_Copies = $Subject_ID =  $Publication_Year	 = '';
  $Is_Available = 'N';
	$errors = array('ISBN_Code' => '', 'Book_Title' => '', 'Book_Language' => '', 'No_of_Copies' => '', 'Subject_ID' => '', 'Publication_Year' => '', 'Is_Available' => '');


	$ISBN_Code = '';
	$errors = array('ISBN_Code' => '');

	if(isset($_GET['submit'])){

		// check ISBN_Code
		if(empty($_GET['ISBN_Code'])){
			$errors['ISBN_Code'] = 'An ISBN_Code is required';
		} else{
			$ISBN_Code = $_GET['ISBN_Code'];
  			if(!preg_match('/^[1-9\s]+$/', $ISBN_Code)){
  				$errors['ISBN_Code'] = 'ISBN_Code must be Numbers only';
			}
    }
	}








		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$ISBN_Code = mysqli_real_escape_string($conn, $_GET['ISBN_Code']);
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
		<h4 class="center">Delete a Book</h4>
		<form class="white" action="DeleteB.php" method="GET">
			<label>ISBN_Code</label>
			<input type="text" name="ISBN_Code" value="<?php echo htmlspecialchars($ISBN_Code) ?>">
			<div class="red-text"><?php echo $errors['ISBN_Code']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
