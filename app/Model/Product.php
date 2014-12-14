<?php
App::import('Model','TiposGlobal');
class Product extends AppModel
{
	var $name = 'Product';
	var $belongsTo = 'Location';
        public $displayField = 'product_name';
        
        var $arreglo=array();
       
        
	var $hasMany = array(			
			'StaffReview' => array('className' => 'Review','conditions'=>array('StaffReview.staff' =>'1',),'order'=> array('StaffReview.review_date'=>'ASC'))	,
                        'TravellerReview' => array('className' => 'Review','conditions'=>array('TravellerReview.staff' =>'0',),'order'=> array('TravellerReview.review_date'=>'ASC')),
                        'Rate',
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION
                                                          )               
                                              )
                                   )   
                            		
					
            );
        
        
        public $validate = array(
                                'product_name' => array(
                                                'rule'    => 'notEmpty',
                                                'message' => 'This field cannot be left blank.'
                                            )
                            );
        
        function setLocale($locale, $country){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            $this->belongsTo['Location']['conditions']['country']=$country;
        }
        
	//var $hasOne = 'Hotel';
}
?>
