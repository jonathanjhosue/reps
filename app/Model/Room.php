<?php  
class Room extends AppModel  
{  
	var $name = 'Room';
	var $belongsTo = 'Hotel';
	var $hasMany = array(
			'RoomDescription' => array('className' => 'RoomDescription'),
			'RoomRate' => array('className' => 'RoomRate')
			);  
	var $displayField = 'category';
}
?>
