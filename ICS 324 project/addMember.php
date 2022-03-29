<?php

	include('test.php');

	$People_ID = $First_Name = $Last_Name = $People_Type =  $Birth_Date	= $Sex = $Department = $Contact_Number = $Email = '';
	$errors = array('People_ID' => '', 'First_Name' => '', 'Last_Name' => '', 'People_Type' => '', 'Birth_Date' => '', 'Sex' => '', 'Department' => '', 'Contact_Number' => '', 'Email' => '');

	if(isset($_GET['submit'])){

		// check People_ID
		if(empty($_GET['People_ID'])){
			$errors['People_ID'] = 'An People_ID is required';
		} else{
			$People_ID = $_GET['People_ID'];
  			if(!preg_match('/^[1-9\s]+$/', $People_ID)){
  				$errors['People_ID'] = 'People_ID must be Numbers only';
			}
    }


		// check First_Name
		if(empty($_GET['First_Name'])){
			$errors['First_Name'] = 'A First_Name is required';
		} else{
			$First_Name = $_GET['First_Name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $First_Name)){
				$errors['First_Name'] = 'First_Name must be letters and spaces only';
			}
		}
    // check Last_Name
    if(empty($_GET['Last_Name'])){
      $errors['Last_Name'] = 'A Last_Name is required';
    } else{
      $Last_Name = $_GET['Last_Name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $Last_Name)){
        $errors['Last_Name'] = 'Last_Name must be letters and spaces only';
      }
    }
    // check People_Type
    if(empty($_GET['People_Type'])){
      $errors['People_Type'] = 'A People_Type is required';
    } else{
      $People_Type = $_GET['People_Type'];
      if(!($People_Type >= 1 && $People_Type <= 4)){
        $errors['People_Type'] = 'People_Type must be numbers only between 1 and 4';
      }
    }
    // check Birth_Date
    if(empty($_GET['Birth_Date'])){
      $errors['Birth_Date'] = 'A Birth_Date is required';
    } else{
      $Birth_Date = $_GET['Birth_Date'];
      if(!preg_match('/^[1-9\s]+$/', $Birth_Date)){
  			  $errors['Birth_Date'] = 'Birth_Date must be numbers only';
      }
    }
    // check Sex
    if(empty($_GET['Sex'])){
      $errors['Sex'] = 'A Sex is required';
    } else{
      $Sex = $_GET['Sex'];
      if(!$Sex == 'M' || !$Sex == 'F'){
        $errors['Sex'] = 'Sex must be M or F only';
      }
    }
    // check Department
    if(empty($_GET['Department'])){
      $errors['Department'] = 'A Department is required';
    } else{
      $Department = $_GET['Department'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $Department)){
        $errors['Department'] = 'Department must be letters and spaces only';
      }
    }
    // check People_ID
    if(empty($_GET['Contact_Number'])){
      $errors['Contact_Number'] = 'An Contact_Number is required';
    } else{
      $People_ID = $_GET['Contact_Number'];
        if(!preg_match('/^[1-9\s]+$/', $Contact_Number)){
          $errors['Contact_Number'] = 'Contact_Number must be Numbers only';
      }
    }
    // check People_ID
    if(empty($_GET['Email'])){
      $errors['Email'] = 'An Email is required';
    } else{
      $People_ID = $_GET['Email'];
        if(!preg_match('/^a-zA-Z^.\s]+$/', $Email)){
          $errors['Email'] = 'Email must be letters and spaces only';
      }
    }






		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$People_ID = mysqli_real_escape_string($conn, $_GET['People_ID']);
			$First_Name = mysqli_real_escape_string($conn, $_GET['First_Name']);
			$Last_Name = mysqli_real_escape_string($conn, $_GET['Last_Name']);
      $People_Type = mysqli_real_escape_string($conn, $_GET['People_Type']);
			$Birth_Date = mysqli_real_escape_string($conn, $_GET['Birth_Date']);
			$Sex = mysqli_real_escape_string($conn, $_GET['Sex']);
      $Department = mysqli_real_escape_string($conn, $_GET['Department']);
      $Contact_Number = mysqli_real_escape_string($conn, $_GET['Contact_Number']);
      $Email = mysqli_real_escape_string($conn, $_GET['Email']);

			// create sql
			$sql = "INSERT INTO library_people(People_ID, First_Name, Last_Name, People_Type, Birth_Date, Sex, Department, Contact_Number, Email) VALUES('$People_ID','$First_Name','Last_Name', '$People_Type', '$Birth_Date', '$Sex', '$Department', '$Contact_Number', '$Email')";

			// save to db and check

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
		<h4 class="center">Add a Member</h4>
		<form class="white" action="addM.php" method="GET">
			<label>People_ID</label>
			<input type="text" name="People_ID" value="<?php echo htmlspecialchars($People_ID) ?>">
			<div class="red-text"><?php echo $errors['People_ID']; ?></div>
			<label>First_Name</label>
			<input type="text" name="First_Name" value="<?php echo htmlspecialchars($First_Name) ?>">
			<div class="red-text"><?php echo $errors['First_Name']; ?></div>
			<label>Last_Name</label>
			<input type="text" name="Last_Name" value="<?php echo htmlspecialchars($Last_Name) ?>">
			<div class="red-text"><?php echo $errors['Last_Name']; ?></div>
      <label>People_Type</label>
			<input type="text" name="People_Type" value="<?php echo htmlspecialchars($People_Type) ?>">
			<div class="red-text"><?php echo $errors['People_Type']; ?></div>
      <label>Birth_Date</label>
			<input type="text" name="Birth_Date" value="<?php echo htmlspecialchars($Birth_Date) ?>">
			<div class="red-text"><?php echo $errors['Birth_Date']; ?></div>
      <label>Sex</label>
			<input type="text" name="Sex" value="<?php echo htmlspecialchars($Sex) ?>">
			<div class="red-text"><?php echo $errors['Sex']; ?></div>
      <label>Department</label>
			<input type="text" name="Department" value="<?php echo htmlspecialchars($Department) ?>">
			<div class="red-text"><?php echo $errors['Department']; ?></div>
      <label>Contact_Number</label>
			<input type="text" name="Contact_Number" value="<?php echo htmlspecialchars($Contact_Number) ?>">
			<div class="red-text"><?php echo $errors['Contact_Number']; ?></div>
      <label>Email</label>
			<input type="text" name="Email" value="<?php echo htmlspecialchars($Email) ?>">
			<div class="red-text"><?php echo $errors['Email']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>



</html>
