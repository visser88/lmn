<?php
class Product extends Eloquent {
	protected $table = 'products';

	protected $guarded = array('name', 'sku');
}
?>