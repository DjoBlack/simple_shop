<?php require './view/partials/header.php'; ?>

<br>
<form method="POST" action="/user/register" class="form-group">
	<input type="email" name="mail" class="form-control"><br>
	<input type="password" name="pass" class="form-control"><br>
		
	<input type="submit" value="Register">
</form>

<?php require './view/partials/footer.php'; ?>