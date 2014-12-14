<?php  
class Region extends AppModel  
{  
	var $name = 'Region';  
	var $displayField = 'region_name';
	var $hasMany = "Location";
}  
?>
