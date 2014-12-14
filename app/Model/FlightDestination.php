<?php  
class FlightDestination extends AppModel  
{  
	var $name = 'FlightDestination';
	var $displayField = 'name';
        var $hasMany = array('Flight'=>array('foreignKey'=>'product_id'));
}
?>
