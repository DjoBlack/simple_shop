<?php require './view/partials/header.php'; ?>


<br>
<div class="row">
	<?php foreach($products as $product) { require './view/partials/product_card.php';} ?>
</div>

<?php require './view/partials/footer.php'; ?>