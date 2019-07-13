<?php require './view/partials/header.php'; ?>

<h2>Order details:</h2>

#<?php echo $order->order_id; ?><br>
Address: <?php echo $order->address; ?><br>
Status: <?php echo $order->status(); ?><br>

<div>
	<table class="table">

		<thead>
			<tr>
				<th>
					Product Name
				</th>
				<th>
					Varinat Name
				</th>			
				<th>
					Amount
				</th>			
				<th>
					Price
				</th>
			</tr>
		</thead>
		<tbody>	
		<?php foreach($lineItems as $lineItem){ ?>
			<tr>
				<td>
					<?php echo $lineItem->product_title; ?>
				</td>
				<td>
					<?php echo $lineItem->variant_title; ?>
				</td>
				<td>
					<?php echo $lineItem->amount; ?>
				</td>
				<td>
					<?php echo $lineItem->price; ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<?php require './view/partials/footer.php'; ?>