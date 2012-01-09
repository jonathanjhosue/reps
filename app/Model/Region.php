<?php  
class Region extends AppModel  
{  
	var $name = 'Region';  
	var $displayName = 'region_name';
	var $hasMany = "Location";
}  
?>
