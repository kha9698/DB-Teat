<?php

	include('test.php');

	$ID = $Password = '';
	$errors = array('ID' => '', 'password' => '');

	if(isset($_GET['submit'])){

		// check email
		if(empty($_GET['ID'])){
			$errors['ID'] = 'Enter an ID';
		} else{
			$ID = $_GET['ID'];
      if(!preg_match('/^[0-9\s]+$/', $ID)){
				$errors['ID'] = 'Title must be numbers only';
			}
		}

		// check title
		if(empty($_GET['password'])){
			$errors['password'] = 'A password is required';
		} else{
			$password = $_GET['password'];
			if(!preg_match('/^[0-9\s]+$/', $password)){
				$errors['password'] = 'password must be numbers only';
			}
		}

		// check ingredients

		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$ID = mysqli_real_escape_string($conn, $_GET['People_ID']);
		//	$password = mysqli_real_escape_string($conn, $_GET['password']);


			// create sql
      $sql = "SELECT People_Type FROM library_people WHERE People_ID = $ID";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}



	} // end POST check


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
    <a href="index.php" class="brand-logo brand-text">KFUPM LIBRARY SYSTEM</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
      <li><a href="add.php" class="btn brand z-depth-0"></a></li>
    </ul>
  </div>
</nav>


	<section class="container grey-text">
		<h4 class="center">Login</h4>
		<form class="white" action="index.php" method="GET">
			<label>ID</label>
			<input type="text" name="ID" value="<?php echo htmlspecialchars($ID) ?>">
			<div class="red-text"><?php echo $errors['ID']; ?></div>
			<label>password</label>
			<input type="text" name="password" value="">
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

</html>
