<?php

	include('test.php');

	$Borrower_ID  = $Bar_Code = $Borrowed_From = $Borrowed_To = $Actual_Return = $Issued_by= '';
	$errors = array('Borrower_ID' => '', 'Bar_Code' => '', 'Borrowed_From' => '', 'Borrowed_To' => '', 'Actual_Return' => '', 'Issued_by' => '');

	if(isset($_GET['submit'])){

		// check Borrower_ID
		if(empty($_GET['Borrower_ID'])){
			$errors['Borrower_ID'] = 'An Borrower_ID  is required';
		} else{
			$Borrower_ID  = $_GET['Borrower_ID'];
  			if(!preg_match('/^[1-9\s]+$/', $Borrower_ID)){
  				$errors['Borrower_ID'] = 'Borrower_ID  must be Numbers only';
			}
    }


		// check Borrowed_From
		if(empty($_GET['Borrowed_From'])){
			$errors['Borrowed_From'] = 'A Borrowed_From is required';
		} else{
			$Borrowed_From = $_GET['Borrowed_From'];
			if(!preg_match('/^[1-9\s]+$/', $Borrowed_From)){
				$errors['Borrowed_From'] = 'Borrowed_From must be must be numbers only';
			}
		}
    // check Bar_Code
    if(empty($_GET['Bar_Code'])){
      $errors['Bar_Code'] = 'A Bar_Code is required';
    } else{
      $Bar_Code = $_GET['Bar_Code'];
      if(!preg_match('/^[1-9\s]+$/', $Bar_Code)){
        $errors['Bar_Code'] = 'Bar_Code must be must be numbers only';
      }
    }
    // check Borrowed_To
    if(empty($_GET['Borrowed_To'])){
      $errors['Borrowed_To'] = 'A Borrowed_To is required';
    } else{
      $Borrowed_To = $_GET['Borrowed_To'];
      if(!preg_match('/^[1-9\s]+$/', $Borrowed_To)){
        $errors['Borrowed_To'] = 'Borrowed_To must be numbers only';
      }
    }
    // check Actual_Return
    if(empty($_GET['Actual_Return'])){
      $errors['Actual_Return'] = 'A Actual_Return is required';
    } else{
      $Actual_Return = $_GET['Actual_Return'];
      if($Actual_Return == "NULL"){

      }
      elseif(!preg_match('/^[1-9\s]+$/', $Actual_Return)){
        $errors['Actual_Return'] = 'Actual_Return must be numbers only';
      }
    }
    // check Issued_by
    if(empty($_GET['Issued_by'])){
      $errors['Issued_by'] = 'A Issued_by is required';
    } else{
      $Issued_by = $_GET['Issued_by'];
      if(!preg_match('/^[1-9\s]+$/', $Issued_by)){
        $errors['Issued_by'] = 'Issued_by must be numbers only';
      }
    }
    // check Is_Available

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$Borrower_ID  = mysqli_real_escape_string($conn, $_GET['Borrower_ID']);
			$Bar_Code = mysqli_real_escape_string($conn, $_GET['Bar_Code']);
			$Borrowed_From = mysqli_real_escape_string($conn, $_GET['Borrowed_From']);
      $Borrowed_To = mysqli_real_escape_string($conn, $_GET['Borrowed_To']);
			$Actual_Return = mysqli_real_escape_string($conn, $_GET['Actual_Return']);
			$Issued_by = mysqli_real_escape_string($conn, $_GET['Issued_by']);

			// create sql
			$sql = "INSERT INTO book_loan(Borrower_ID , Bar_Code, Borrowed_From, Borrowed_To, Actual_Return, Issued_by) VALUES('{$Borrower_ID}','{$Bar_Code}','{Borrowed_From}', '{$Borrowed_To}', '{$Actual_Return}', '{$Issued_by}')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: member.php');
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
    <a href="member.php" class="brand-logo brand-text">Member</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
      <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
    </ul>
  </div>
</nav>

	<section class="container grey-text">
		<h4 class="center">Check out Book</h4>
		<form class="white" action="CheckOutB.php" method="GET">
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
      <label>Actual_Return</label>
			<input type="text" name="Actual_Return" value="<?php echo htmlspecialchars($Actual_Return) ?>">
			<div class="red-text"><?php echo $errors['Actual_Return']; ?></div>
      <label>Issued_by</label>
			<input type="text" name="Issued_by" value="<?php echo htmlspecialchars($Issued_by) ?>">
			<div class="red-text"><?php echo $errors['Issued_by']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
