<?php require './view/partials/header.php'; ?>


<form method="POST" action="/admin/product_create">
	<br>
	<div class="form-group">
		<label for="productTitleArea">Product Title</label>
		<input type="text" name="title" class="form-control" id="productTitleArea">
	</div>
	<div class="form-group">
		<label for="productDescrArea">Product Description</label>
		<textarea name="descr" placeholder="Product Description" class="form-control" row="5" id="productDescrArea"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="Add product">
	</div>
</form>


<?php require './view/partials/footer.php'; ?>