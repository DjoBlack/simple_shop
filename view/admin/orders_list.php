<?php require './view/partials/header.php'; ?>

<h2>Orders:</h2>

<div>
	<table class="table">
		<?php foreach($orders as $order){ ?>
			<tr>
				<td>
					<a href="/admin/orders/details?order_id=<?php echo $order->order_id; ?>">
						<?php echo $order->order_id; ?>
					</a>
				</td>
				<td>
					<?php echo $order->status(); ?>
				</td>
				<td>
					<?php echo $order->total_cost; ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>

<?php require './view/partials/footer.php'; ?>