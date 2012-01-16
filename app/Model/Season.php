<?php
class Season extends AppModel
{
	var $name = 'Season';
	var $belongsTo = 'Hotel';
        var $hasMany = 'RoomRate';
}
?>
