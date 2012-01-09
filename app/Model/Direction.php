<?php
class Direction extends AppModel
{
	var $name = 'Direction';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'Language' => array('className' => 'Language')
			);
}
?>
