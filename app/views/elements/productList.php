<div class="row-fluid">
	<?php
		foreach($products as $i => $product){
			if($i == 3){
				echo '</div>';
				echo '<div class="row-fluid">';
			}
			echo '<div class="span4 product-item">';
			echo '<img src="/img/lemon.jpg" class="lemon" />';
			echo '<div class="product-name">'.$product->name.'</div>';
			if($product->is_on_sale){
				echo '<div class="product-price sale">$'.money_format('%i', $product->base_price).'</div>';
				echo '<div class="product-sale">On Sale: $'.money_format('%i', $product->sale_price_or_discount).'</div>';
			}
			else echo '<div class="product-price">$'.money_format('%i', $product->base_price).'</div>';
			echo '<small class="desc">'.$product->description.'</small>';
			echo '</div>';
		}
	?>
</div>
<div class="row-fluid">
	<div class="span12">
		<?php echo $products->links(); ?>
	</div>
</div>