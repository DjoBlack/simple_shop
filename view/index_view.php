<?php require './view/partials/header.php'; ?>

<div id="content" class="row justify-content-md-center">
	<div class="col-md-auto">
		Hello!
	</div>
</div>

<div class="row">
	<?php foreach($products as $product) { require './view/partials/product_card.php';} ?>
</div>

<?php require './view/partials/footer.php'; ?>