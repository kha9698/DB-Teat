<?php

	include('test.php');

	$ISBN_Code = $Borrower_ID = $Reserve_Date = '';
  $Status = 'N';
	$errors = array('ISBN_Code' => '', 'Borrower_ID' => '', 'Reserve_Date' => '', 'Status' => '');

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


		// check Borrower_ID
		if(empty($_GET['Borrower_ID'])){
			$errors['Borrower_ID'] = 'A Borrower_ID is required';
		} else{
			$Borrower_ID = $_GET['Borrower_ID'];
			if(!preg_match('/^[1-9\s]+$/', $Borrower_ID)){
				$errors['Borrower_ID'] = 'Borrower_ID must be numbers only';
			}
		}
    // check Reserve_Date
    if(empty($_GET['Reserve_Date'])){
      $errors['Reserve_Date'] = 'A Reserve_Date is required';
    } else{
      $Reserve_Date = $_GET['Reserve_Date'];
      if(!preg_match('/^[1-9\s]+$/', $Reserve_Date)){
        $errors['Reserve_Date'] = 'Reserve_Date must be numbers only';
      }

    }
    if(empty($_GET['Status'])){
      $errors['Status'] = 'A Status is required';
    } else{
      $Status = $_GET['Status'];
      if(!($Status == 'Y' || $Status == 'N')){
        $errors['Status'] = 'Status must be N or Y only';
      }
    }

    }






		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars

			$ISBN_Code = mysqli_real_escape_string($conn, $_GET['ISBN_Code']);
			$Borrower_ID = mysqli_real_escape_string($conn, $_GET['Borrower_ID']);
			$Reserve_Date = mysqli_real_escape_string($conn, $_GET['Reserve_Date']);
      $Status = mysqli_real_escape_string($conn, $_GET['Status']);

			// create sql
			$sql = "INSERT INTO book_reserve(Borrower_ID, ISBN_Code, Reserve_Date, Status) VALUES('{$Borrower_ID}','{$ISBN_Code}','{$Reserve_Date}', '{$Status}')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: member.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	 // end GET check

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
		<h4 class="center">Reserve a Book</h4>
		<form class="white" action="reserveB.php" method="GET">
      <label>Borrower_ID</label>
      <input type="text" name="Borrower_ID" value="<?php echo htmlspecialchars($Borrower_ID) ?>">
      <div class="red-text"><?php echo $errors['Borrower_ID']; ?></div>
			<label>ISBN_Code</label>
			<input type="text" name="ISBN_Code" value="<?php echo htmlspecialchars($ISBN_Code) ?>">
			<div class="red-text"><?php echo $errors['ISBN_Code']; ?></div>
			<label>Reserve_Date</label>
			<input type="text" name="Reserve_Date" value="<?php echo htmlspecialchars($Reserve_Date) ?>">
			<div class="red-text"><?php echo $errors['Reserve_Date']; ?></div>
      <label>Status</label>
			<input type="text" name="Status" value="<?php echo htmlspecialchars($Status) ?>">
			<div class="red-text"><?php echo $errors['Status']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
