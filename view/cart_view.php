<?php require './view/partials/header.php'; ?>

<br>
<div class="row container">
	<table class="table">
		<?php if(!empty($_SESSION['cart'])){ ?>
			<?php foreach ($variants as $variant) { ?>
				<tr>
					<td>
						<?= $variant->variant_title; ?>
					</td>
					<td id="amount-<?php echo $variant->variant_id; ?>">
						<?= $variant->amount; ?>
					</td>
					<td>
						<form action="/cart/add" method="POST">
		        			<input type="hidden" name="variant_id" value="<?php echo $variant->variant_id; ?>">
		       				<button class="add-amount" data-id="<?php echo $variant->variant_id; ?>">+</button>
	      				</form>
					</td>
					<td>
						<form action="/cart/substract" method="POST">
		        			<input type="hidden" name="variant_id" value="<?php echo $variant->variant_id; ?>">
		       				<button class="substract-amount" data-id="<?php echo $variant->variant_id; ?>">-</button>
	      				</form>
					</td>
				</tr>
		<?php }} else { ?> 
			<h2>Your cart is empty!</h2> 
		<?php } ?>
	</table>
</div>
<div>
		<?php if(!empty($_SESSION['cart'])){ ?>
			<form action="/order/new" method="GET">
				<button>Submit order</button>
			</form><br>
	<?php } ?>
	<form action="/cart/remove" method="POST">
	   		<button>Remove all from cart</button>
	</form>
</div>

<?php require './view/partials/footer.php'; ?>





<script>
	$(document).ready(function() {
		$('button.add-amount').click(function(event) {
			event.preventDefault();
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
		});

		$('button.substract-amount').click(function(event) {
			event.preventDefault();
			$.ajax({
				method: 'post',
				url: '/cart/substract',
				data: {
					variant_id: this.dataset.id //152
				}
			}).done(function(res) {
				JSON.stringify(res);
				const data = JSON.parse(res);
				$('#amount-'+data.variant_id).html(data.amount);
			});
		});
	});
	
</script>