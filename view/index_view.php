<?php require './view/partials/header.php'; ?>

<br>
<div class="row">
	<?php foreach($products as $product) { require './view/partials/product_card.php';} ?>
</div>

<?php require './view/partials/footer.php'; ?>

<script>
	$(document).ready(function() {
		$('.add-to-cart').click(function(event) {
			event.preventDefault();

			console.log(this.dataset.id);

			$.ajax({
				method: 'post',
				url: '/cart/add',
				data: {
					variant_id: this.dataset.id //152
				}
			}).done(function(res) {
				JSON.stringify(res);
				const data = JSON.parse(res);
				$('#amount-'+data.variant_id).html(data.amount);
			});

			$('.alert').addClass('show');
		});

		$('.alert button').click(function(){
			$('.alert').removeClass('show');
		});
	});
</script>

<div class="alert alert-warning alert-dismissible fade" role="alert" style="position: fixed; top:50px; right:40%;">
  <strong>Product has been added to a <a href="/cart">cart</a>.</strong>
  <button type="button" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

