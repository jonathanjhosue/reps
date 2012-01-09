<?php  
class Hotel extends AppModel  
{  
	var $scaffold = 'admin';
	
	var $name = 'Hotel';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'HotelCategory' => array('className' => 'HotelCategory')
			); 
	var $hasMany = 'Room';  
	var $displayField = 'hotel_name';
}  
?>

