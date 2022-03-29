<?php

	include('test.php');

?>

<!DOCTYPE html>
<html>

<head>
<title>Librarian</title>
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
		<h4 class="center">Your request sent successfully</h4>
		<form class="white" action="librarian.php" method="GET">
			<div class="center">
				<input type="submit" name="submit" value="Back" class="btn brand z-depth-0">
			</div>
		</form>

</html>
