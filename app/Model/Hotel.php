<?php  
App::import('Model','TiposGlobal');
class Hotel extends AppModel  
{  
	//var $scaffold = 'admin';
        

        var $primaryKey='product_id';
	
	var $name = 'Hotel';
	var $belongsTo = array(
			'Product' => array('className' => 'Product'),
			'HotelCategory' => array('className' => 'HotelCategory')
			); 
	var $hasMany = array(
                        'Room',
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.owner_type'=>TiposGlobal::PRODUCT_TYPE_HOTEL)),
                        'Season'=>array('foreignKey'=>'product_id','conditions'=>array('Season.parent_id'=>null)),
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING,
                                                                TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES,
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION
                                                          )                                                   
                                              )
                                   )   ,     			
			'Review' => array('foreignKey'=>'product_id','order'=> array('Review.staff'=>'DESC','Review.review_date'=>'DESC'))	
                        
                        );
        
        
         public $validate = array(
                                'infant_age_max' =>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'infant_age_min'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'child_age_max'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'child_age_min'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true)                                 
                            );
        
         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
        
	//var $displayField = 'Product.product_name';  
        
}  
?>

