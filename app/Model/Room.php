<?php  
class Room extends AppModel  
{  
	var $name = 'Room';
	var $belongsTo = 'Hotel';
	var $hasMany = array(
			'RoomRate' => array('className' => 'RoomRate')
			);  
	var $displayField = 'category';
}
?>
