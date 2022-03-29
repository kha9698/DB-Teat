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
    <a href="index.php" class="brand-logo brand-text">Librarian</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
      <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
    </ul>
  </div>
</nav>

	<section class="container grey-text">
		<h4 class="center">Add a Book</h4>
		<form class="white" action="addBook.php" method="GET">
			<div class="center">
				<input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
			</div>
		</form>
    <section class="container grey-text">
  		<h4 class="center">Edit a Book</h4>
  		<form class="white" action="EditBook.php" method="GET">

  			<div class="center">
  				<input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
  			</div>
  		</form>
      <section class="container grey-text">
    		<h4 class="center">Delete a Book</h4>
    		<form class="white" action="deleteBook.php" method="GET">

    			<div class="center">
    				<input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
    			</div>
    		</form>
        <section class="container grey-text">
      		<h4 class="center">Add a Member</h4>
      		<form class="white" action="addMember.php" method="GET">

      			<div class="center">
      				<input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
      			</div>
      		</form>
          <section class="container grey-text">
        		<h4 class="center">Delete a Member</h4>
        		<form class="white" action="deleteMember.php" method="GET">

        			<div class="center">
        				<input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
        			</div>
        		</form>
	</section>
  <section class="container grey-text">
    <h4 class="center">Request a Book</h4>
    <form class="white" action="requestBook.php" method="GET">
      <div class="center">
        <input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
      </div>
    </form>
</section>

<section class="container grey-text">
  <h4 class="center">Reports</h4>
  <form class="white" action="reports.php" method="GET">
    <div class="center">
      <input type="submit" name="submit" value="Click here" class="btn brand z-depth-0">
    </div>
  </form>
</section>



</html>
