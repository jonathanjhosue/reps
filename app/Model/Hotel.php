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
        
        
         public $hasAndBelongsToMany = array(
                                            'Activity' =>
                                                array(
                                                    'className'              => 'Activity',
                                                    'joinTable'              => 'relations',
                                                    'foreignKey'             => 'product_id1',
                                                    'associationForeignKey'  => 'product_id2',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    )
                                        );
        
        
         public $validate = array(
                                'infant_age_max' =>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'infant_age_min'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'child_age_max'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true),
                                'child_age_min'=>array('rule'    => 'numeric','message' => 'Please supply the age.','allowEmpty' => true)                                 
                            );
        
         function setLocale($language, $country=null){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$language;
            
            if($country!=null ){
																
			$this->belongsTo['Location']['foreignKey']=false;
			$this->belongsTo['Location']['type']='INNER';
			//'conditions'=>array('Product.location_id=Location.id','Product.location_id=Location.id')
			$this->belongsTo['Location']['conditions'][0]='Product.location_id=Location.id';
			$this->belongsTo['Location']['conditions']['country']=$country;
		}
            
        }
        
	//var $displayField = 'Product.product_name';  
        
}  
?>

