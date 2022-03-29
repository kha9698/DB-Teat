<?php

	include('test.php');

	$First_Name = $Last_Name = $Book_Title = '';
	$errors = array('First_Name' => '', 'Last_Name' => '', 'Book_Title' => '');

	if(isset($_GET['submit'])){

		// check First_Name
		if(empty($_GET['First_Name'])){
			$errors['First_Name'] = 'A First_Name is required';
		} else{
			$First_Name = $_GET['First_Name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $First_Name)){
				$errors['First_Name'] = 'First_Name must be letters and spaces only';
			}
		}

    // check Book_Title
    if(empty($_GET['Last_Name'])){
      $errors['Last_Name'] = 'A Last_Name is required';
    } else{
      $Last_Name = $_GET['Last_Name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $Last_Name)){
        $errors['Last_Name'] = 'Last_Name must be letters and spaces only';
      }
    }

    // check Book_Title
    if(empty($_GET['Book_Title'])){
      $errors['Book_Title'] = 'A Book_Title is required';
    } else{
      $Book_Title = $_GET['Book_Title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $Book_Title)){
        $errors['Book_Title'] = 'Book_Title must be letters and spaces only';
      }
    }


		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$First_Name = mysqli_real_escape_string($conn, $_GET['First_Name']);
      $Last_Name = mysqli_real_escape_string($conn, $_GET['Last_Name']);
			$Book_Title = mysqli_real_escape_string($conn, $_GET['Book_Title']);

			// create sql

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: librarian.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	} // end GET check

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
		<h4 class="center">Request a Book</h4>
		<form class="white" action="requestB.php" method="GET">
			<label>First_Name</label>
			<input type="text" name="First_Name" value="<?php echo htmlspecialchars($First_Name) ?>">
			<div class="red-text"><?php echo $errors['First_Name']; ?></div>
      <label>Last_Name</label>
      <input type="text" name="Last_Name" value="<?php echo htmlspecialchars($Last_Name) ?>">
      <div class="red-text"><?php echo $errors['Last_Name']; ?></div>
			<label>Book_Title</label>
			<input type="text" name="Book_Title" value="<?php echo htmlspecialchars($Book_Title) ?>">
			<div class="red-text"><?php echo $errors['Book_Title']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

</html>
