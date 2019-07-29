<?php require './view/partials/header.php'; ?>


<form method="POST" action="/order">
	<?php  if(empty($_SESSION[BaseController::$userSessionField])){ ?>

		<input type="email" name="email" placeholder="Enter your email">

	<?php } ?>

		<input type="text" name="address" placeholder="Enter your adress">
		<input type="submit" name="Submit order">
</form>



<?php require './view/partials/footer.php'; ?>