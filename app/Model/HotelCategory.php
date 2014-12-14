<?php  
class HotelCategory extends AppModel  
{  
	var $name = 'HotelCategory';
	var $displayField = 'category_name';
        var $hasMany = array(
                        'Hotel'
                       
                        );
}
?>
