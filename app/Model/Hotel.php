<?php  
App::import('Model','TiposGlobal');
class Hotel extends AppModel  
{  
	var $scaffold = 'admin';
	
	var $name = 'Hotel';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'HotelCategory' => array('className' => 'HotelCategory')
			); 
	var $hasMany = array(
                        'Room',
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.type'=>TiposGlobal::PRODUCT_TYPE_HOTEL)),
                        'Season',
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING,
                                                                TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES
                                                          )
                                                   
                                              )
                                   )
                        );  
        
	var $displayField = 'hotel_name';  
        
      
        
    
        
}  
?>

