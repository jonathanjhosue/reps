<?php
class ProductName extends AppModel
{
	var $name = 'ProductName';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'Language' => array('className' => 'Language')
			);
}
?>
