<?php require './view/partials/header.php'; ?>

<br>

<form method="POST" action="/user/login" class="form-group">
	<input type="email" name="mail" class="form-control"><br>
	<input type="password" name="pass" class="form-control"><br>
		
	<input type="submit" value="Login">
</form>

<?php require './view/partials/footer.php'; ?>