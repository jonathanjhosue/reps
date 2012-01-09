<?php
class Description extends AppModel
{
	var $name = 'Description';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'Language' => array('className' => 'Language')
			);
}
?>
