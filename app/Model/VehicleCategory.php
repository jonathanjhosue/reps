<?php  
class VehicleCategory extends AppModel  
{  
	var $name = 'VehicleCategory';
	var $displayField = 'name';
        var $hasMany = array('Vehicle'=>array('foreignKey'=>'category_id'));
}
?>
