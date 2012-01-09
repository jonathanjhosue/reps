<?php
class RoomDescription extends AppModel  
{  
	var $name = 'RoomDescription';
	var $belongsTo = array(
			'Room' => array('className' => 'Room'),
			'Language' => array('className' => 'Language')
			);
}
?>
