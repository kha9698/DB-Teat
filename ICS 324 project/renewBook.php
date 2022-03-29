<?php

	include('test.php');
	$Borrower_ID = $Bar_Code = $Borrowed_From = $Borrowed_To ='';
	$errors = array('Borrower_ID' => '', 'Bar_Code' => '', 'Borrowed_From' => '', 'Borrowed_To' => '');


	if(isset($_GET['submit'])){

		// check Borrower_ID
		if(empty($_GET['Borrower_ID'])){
			$errors['Borrower_ID'] = 'An Borrower_ID is required';
		} else{
			$Borrower_ID = $_GET['Borrower_ID'];
  			if(!preg_match('/^[1-9\s]+$/', $Borrower_ID)){
  				$errors['Borrower_ID'] = 'Borrower_ID must be Numbers only';
			}
    }
    if(empty($_GET['Bar_Code'])){
			$errors['Bar_Code'] = 'An Bar_Code is required';
		} else{
			$Bar_Code = $_GET['Bar_Code'];
  			if(!preg_match('/^[1-9\s]+$/', $Bar_Code)){
  				$errors['Bar_Code'] = 'Bar_Code must be Numbers only';
			}
    }
    if(empty($_GET['Borrowed_From'])){
			$errors['Borrowed_From'] = 'An Borrowed_From is required';
		} else{
			$Bar_Code = $_GET['Borrowed_From'];
  			if(!preg_match('/^[1-9\s]+$/', $Borrowed_From)){
  				$errors['Borrowed_From'] = 'Borrowed_From must be Numbers only';
			}
    }
    if(empty($_GET['Borrowed_To'])){
			$errors['Borrowed_To'] = 'An Borrowed_To is required';
		} else{
			$Bar_Code = $_GET['Borrowed_To'];
  			if(!preg_match('/^[1-9\s]+$/', $Borrowed_To)){
  				$errors['Borrowed_To'] = 'Borrowed_To must be Numbers only';
			}
    }
	}








		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$Borrower_ID = mysqli_real_escape_string($conn, $_GET['Borrower_ID']);
}
			// create sql
		//	$sql = "INSERT INTO Book(Borrower_ID,Book_Title,Book_Language, No_of_Copies, Subject_ID, Publication_Year, Is_Available) VALUES('$Borrower_ID','$Book_Title','Book_Language', '$No_of_Copies', '$Subject_ID', '$Publication_Year', '$Is_Available')";

			// save to db and check
		//	if(mysqli_query($conn, $sql)){
				// success
		//		header('Location: member.php');
		//	} else {
			//	echo 'query error: '. mysqli_error($conn);
	///		}


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
    <a href="member.php" class="brand-logo brand-text">Member</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
      <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
    </ul>
  </div>
</nav>

	<section class="container grey-text">
		<h4 class="center">Renew Book</h4>
		<form class="white" action="renewB.php" method="GET">
			<label>Borrower_ID</label>
			<input type="text" name="Borrower_ID" value="<?php echo htmlspecialchars($Borrower_ID) ?>">
			<div class="red-text"><?php echo $errors['Borrower_ID']; ?></div>
      <label>Bar_Code</label>
      <input type="text" name="Bar_Code" value="<?php echo htmlspecialchars($Bar_Code) ?>">
      <div class="red-text"><?php echo $errors['Bar_Code']; ?></div>
      <label>Borrowed_From</label>
      <input type="text" name="Borrowed_From" value="<?php echo htmlspecialchars($Borrowed_From) ?>">
      <div class="red-text"><?php echo $errors['Borrowed_From']; ?></div>
      <label>Borrowed_To</label>
      <input type="text" name="Borrowed_To" value="<?php echo htmlspecialchars($Borrowed_To) ?>">
      <div class="red-text"><?php echo $errors['Borrowed_To']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
