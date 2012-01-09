<?php  
class Location extends AppModel  
{  
	var $name = 'Location';  
	var $displayField = 'location_name';
	var $belongsTo = 'Region'; 	
	//var $scaffold = 'admin';
}
?>
