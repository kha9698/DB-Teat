
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

<h6 class="center grey-text">New members who were added this year but did not check out any book!</h6>
<?php

	include('test.php');

	// write query for all pizzas
	$sql = "SELECT distinct a.First_Name, a.Last_Name from library_people a join book_loan b where a.people_id != b.Borrower_ID and a.People_ID like '2021%'";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$people1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

	<div class="container">
		<div class="row">

			<?php foreach($people1 as $person1): ?>

				<div class="center">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($person1['First_Name']).' '.htmlspecialchars($person1['Last_Name']); ?></h6>

						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

  <h6 class="center grey-text">members and their penalty amounts. </h6>
  <?php

  	include('test.php');

  	// write query for all pizzas
  	$sql = "SELECT Borrower_ID, (Actual_Return - Borrowed_To)*10 FROM book_loan where (Actual_Return - Borrowed_To) >= 1;";

  	// get the result set (set of rows)
  	$result = mysqli_query($conn, $sql);

  	// fetch the resulting rows as an array
  	$people2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

  	// free the $result from memory (good practise)
  	mysqli_free_result($result);

  	// close connection
  	mysqli_close($conn);


  ?>

  	<div class="container">
  		<div class="row">

  			<?php foreach($people2 as $person2): ?>

  				<div class="center">
  					<div class="card z-depth-0">
  						<div class="card-content center">
  							<h6><?php echo htmlspecialchars($person2['Borrower_ID']).'     '.htmlspecialchars($person2['(Actual_Return - Borrowed_To)*10']).'SR'; ?></h6>

  						</div>
  					</div>
  				</div>

  			<?php endforeach; ?>

  		</div>
  	</div>

    <h6 class="center grey-text">Members who more than 3 books and who have exceeded 120 days for at least one book.  </h6>
    <?php

    	include('test.php');

    	// write query for all pizzas
    	$sql = 'SELECT Borrower_ID from book_loan where (Actual_Return - Borrowed_To) >= 120 GROUP by Borrower_ID';

    	// get the result set (set of rows)
    	$result = mysqli_query($conn, $sql);

    	// fetch the resulting rows as an array
    	$people3 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    	// free the $result from memory (good practise)
    	mysqli_free_result($result);

    	// close connection
    	mysqli_close($conn);


    ?>

    	<div class="container">
    		<div class="row">

    			<?php foreach($people3 as $person3): ?>

    				<div class="center">
    					<div class="card z-depth-0">
    						<div class="card-content center">
    							<h6><?php echo htmlspecialchars($person3['Borrower_ID']); ?></h6>

    						</div>
    					</div>
    				</div>

    			<?php endforeach; ?>

    		</div>
    	</div>

      <h6 class="center grey-text">Members who check out books but return them at least one day before due date.</h6>
      <?php

      	include('test.php');

      	// write query for all pizzas
      	$sql = "SELECT Borrower_ID FROM book_loan where (Borrowed_To - Actual_Return) >= 1";

      	// get the result set (set of rows)
      	$result = mysqli_query($conn, $sql);

      	// fetch the resulting rows as an array
      	$people4 = mysqli_fetch_all($result, MYSQLI_ASSOC);

      	// free the $result from memory (good practise)
      	mysqli_free_result($result);

      	// close connection
      	mysqli_close($conn);


      ?>

      	<div class="container">
      		<div class="row">

      			<?php foreach($people4 as $person4): ?>

      				<div class="center">
      					<div class="card z-depth-0">
      						<div class="card-content center">
      							<h6><?php echo htmlspecialchars($person4['Borrower_ID']); ?></h6>

      						</div>
      					</div>
      				</div>

      			<?php endforeach; ?>

      		</div>
      	</div>



</html>
