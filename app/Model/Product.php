<?php
class Product extends AppModel
{
	var $name = 'Product';
	var $belongsTo = 'Location';
	var $hasMany = array(
			'ProductName' => array('className' => 'ProductName'),
			'Review' => array('className' => 'Review'),
			'Direction' => array('className' => 'Direction'),
			'Description' => array('className' => 'Description'),
			'Image' => array('className' => 'Image')
			);
	var $hasOne = 'Hotel';
}
?>
