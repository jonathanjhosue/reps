<?php
class Product extends AppModel
{
	var $name = 'Product';
	var $belongsTo = 'Location';
	var $hasMany = array(			
			'StaffReview' => array('className' => 'Review','conditions'=>array('StaffReview.staff' =>'1',),'order'=> array('StaffReview.review_date'=>'ASC'))	,
                        'TravellerReview' => array('className' => 'Review','conditions'=>array('TravellerReview.staff' =>'0',),'order'=> array('TravellerReview.review_date'=>'ASC')),
                         'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION
                                                          )
                                                   
                                              )
                                   )   
                            		
					
            );
	var $hasOne = 'Hotel';
}
?>
