<?php require './view/partials/header.php'; ?>


<form method="POST" action="/admin/variants">
	<br>
	<div class="form-group">
		<label for="variantTitleArea">Variant Title</label>
		<input type="text" name="title" class="form-control" id="variantTitleArea">
	</div>

	<div class="form-group">
		<label for="variantDescrArea">Variant Description</label>
		<textarea name="descr" placeholder="Variant Description" class="form-control" row="3" id="variantDescrArea"></textarea>
	</div>

 	<div class="form-group">
		<label for="variantAmount">Variant Amount</label>
		<input type="number" name="amount" class="form-control" id="variantAmount">
	</div>

	<div class="form-group">
		<label for="variantPrice">Variant Price</label>
		<input type="text" name="price" class="form-control" id="variantPrice">
	</div>

	<div class="form-group">
    	<label for="formControlFile">Image</label>
    	<input type="file" class="form-control-file" id="formControlFile" name="image">
 	</div>

	<div class="form-group">
    <label for="formControlSelect">Example select</label>
	    <select class="form-control" id="formControlSelect" name="product_id">
	    	<?php foreach ($products as $product){ ?>
			    <option value="<?php echo $product->id; ?>">
			    	<?php echo $product->title; ?>
			    </option>
			<?php } ?>
	    </select>
  	</div>


	<div class="form-group">
		<input type="submit" name="Create variant">
	</div>
</form>


<?php require './view/partials/footer.php'; ?>