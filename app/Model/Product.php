<?php
class Product extends AppModel
{
	var $name = 'Product';
	var $belongsTo = 'Location';
	var $hasMany = array(			
			'StaffReview' => array('className' => 'Review','conditions'=>array('StaffReview.staff' =>'1',),'order'=> array('StaffReview.review_date'=>'ASC'))	,
                        'TravellerReview' => array('className' => 'Review','conditions'=>array('TravellerReview.staff' =>'0',),'order'=> array('TravellerReview.review_date'=>'ASC'))		
					
            );
	var $hasOne = 'Hotel';
}
?>
