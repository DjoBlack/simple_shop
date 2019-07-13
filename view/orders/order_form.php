<?php require './view/partials/header.php'; ?>

<?php  if(!empty($_SESSION[BaseController::$userSessionField])){ ?>

	<form method="POST" action="/order">
		<input type="text" name="address" placeholder="Enter your adress">
		<input type="submit" name="Submit order">
	</form>

<?php } else { ?>

	<h2>Please login!</h2>

<?php } ?>



<?php require './view/partials/footer.php'; ?>