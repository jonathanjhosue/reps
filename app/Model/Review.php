<?php
class Review extends AppModel
{
	var $name = 'Review';
	var $belongsTo = array(
			'Product' => array('className' => 'Product')			
			);
}
?>
