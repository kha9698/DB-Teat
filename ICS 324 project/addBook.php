<?php

	include('test.php');

	$ISBN_Code = $Book_Title = $Book_Language = $No_of_Copies = $Subject_ID =  $Publication_Year	 = '';
  $Is_Available = 'N';
	$errors = array('ISBN_Code' => '', 'Book_Title' => '', 'Book_Language' => '', 'No_of_Copies' => '', 'Subject_ID' => '', 'Publication_Year' => '', 'Is_Available' => '');

	if(isset($_GET['submit'])){

		// check ISBN_Code
		if(empty($_GET['ISBN_Code'])){
			$errors['ISBN_Code'] = 'An ISBN_Code is required';
		} else{
			$ISBN_Code = $_GET['ISBN_Code'];
  			if(!preg_match('/^[a-zA-Z\s]+$/', $ISBN_Code)){
  				$errors['ISBN_Code'] = 'ISBN_Code must be Numbers only';
			}
    }


		// check Book_Language
		if(empty($_GET['Book_Language'])){
			$errors['Book_Language'] = 'A Book_Language is required';
		} else{
			$Book_Language = $_GET['Book_Language'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $Book_Language)){
				$errors['Book_Language'] = 'Book_Language must be letters and spaces only';
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
    // check No_of_Copies
    if(empty($_GET['No_of_Copies'])){
      $errors['No_of_Copies'] = 'A No_of_Copies is required';
    } else{
      $No_of_Copies = $_GET['No_of_Copies'];
      if(!preg_match('/^[1-9\s]+$/', $No_of_Copies)){
        $errors['No_of_Copies'] = 'No_of_Copies must be numbers only';
      }
    }
    // check Subject_ID
    if(empty($_GET['Subject_ID'])){
      $errors['Subject_ID'] = 'A Subject_ID is required';
    } else{
      $Subject_ID = $_GET['Subject_ID'];
      if(!preg_match('/^[1-9\s]+$/', $Subject_ID)){
        $errors['Subject_ID'] = 'Subject_ID must be numbers only';
      }
    }
    // check Publication_Year
    if(empty($_GET['Publication_Year'])){
      $errors['Publication_Year'] = 'A Publication_Year is required';
    } else{
      $Publication_Year = $_GET['Publication_Year'];
      if(!preg_match('/^[1-9\s]+$/', $Publication_Year)){
        $errors['Publication_Year'] = 'Publication_Year must be numbers only';
      }
    }
    // check Is_Available
    if(empty($_GET['Is_Available'])){
      $errors['Is_Available'] = 'A Is_Available is required';
    } else{
      $Is_Available = $_GET['Is_Available'];
      if(!$Is_Available == 'Y' || !$Is_Available == 'N'){
        $errors['Is_Available'] = 'Is_Available must be N or Y only';
      }
    }






		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$ISBN_Code = mysqli_real_escape_string($conn, $_GET['ISBN_Code']);
			$Book_Title = mysqli_real_escape_string($conn, $_GET['Book_Title']);
			$Book_Language = mysqli_real_escape_string($conn, $_GET['Book_Language']);
      $No_of_Copies = mysqli_real_escape_string($conn, $_GET['No_of_Copies']);
			$Subject_ID = mysqli_real_escape_string($conn, $_GET['Subject_ID']);
			$Publication_Year = mysqli_real_escape_string($conn, $_GET['Publication_Year']);
      $Is_Available = mysqli_real_escape_string($conn, $_GET['Is_Available']);

			// create sql
			$sql = "INSERT INTO Book(ISBN_Code,Book_Title,Book_Language, No_of_Copies, Subject_ID, Publication_Year, Is_Available) VALUES('$ISBN_Code','$Book_Title','Book_Language', '$No_of_Copies', '$Subject_ID', '$Publication_Year', '$Is_Available')";

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
		<h4 class="center">Add a Book</h4>
		<form class="white" action="addB.php" method="GET">
			<label>ISBN_Code</label>
			<input type="text" name="ISBN_Code" value="<?php echo htmlspecialchars($ISBN_Code) ?>">
			<div class="red-text"><?php echo $errors['ISBN_Code']; ?></div>
			<label>Book_Title</label>
			<input type="text" name="Book_Title" value="<?php echo htmlspecialchars($Book_Title) ?>">
			<div class="red-text"><?php echo $errors['Book_Title']; ?></div>
			<label>Book_Language</label>
			<input type="text" name="Book_Language" value="<?php echo htmlspecialchars($Book_Language) ?>">
			<div class="red-text"><?php echo $errors['Book_Language']; ?></div>
      <label>No_of_Copies</label>
			<input type="text" name="No_of_Copies" value="<?php echo htmlspecialchars($No_of_Copies) ?>">
			<div class="red-text"><?php echo $errors['No_of_Copies']; ?></div>
      <label>Subject_ID</label>
			<input type="text" name="Subject_ID" value="<?php echo htmlspecialchars($Subject_ID) ?>">
			<div class="red-text"><?php echo $errors['Subject_ID']; ?></div>
      <label>Publication_Year</label>
			<input type="text" name="Publication_Year" value="<?php echo htmlspecialchars($Publication_Year) ?>">
			<div class="red-text"><?php echo $errors['Publication_Year']; ?></div>
      <label>Is_Available</label>
			<input type="text" name="Is_Available" value="<?php echo htmlspecialchars($Is_Available) ?>">
			<div class="red-text"><?php echo $errors['Is_Available']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
