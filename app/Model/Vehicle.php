<?php
App::uses('AppModel', 'Model');
App::import('Model','TiposGlobal');
/**
 * Activity Model
 *
 * @property Product $Product
 * @property ActivityType $ActivityType
 */
class Vehicle extends AppModel {

	public $primaryKey = 'product_id';

	public $displayField = 'product_id';
	
	public $belongsTo = array(
                    'Product' => array(
                            'className' => 'Product',
                            'foreignKey' => 'product_id'
                    ),

                    'VehicleCategory' => array(
                            'className' => 'VehicleCategory',
                            'foreignKey' => 'category_id'
                    ),
                    'Rentacar' => array(
                            'className' => 'Rentacar',
                            'foreignKey' => 'rentacar_id'
                    )
		);
        
       
        public $validate = array(
                        'pax' =>array('rule'    => 'numeric','message' => 'Please supply the age min.','allowEmpty' => false),
                        'luggage' =>array('rule'    => 'numeric','message' => 'Please supply the age max.','allowEmpty' => false),
                        'doors' =>array('rule'    => 'numeric','message' => 'Please supply the pax min.','allowEmpty' => false),
                        'subcategory' =>array('rule' => 'notEmpty','message' => 'This field cannot be left blank.'),
                        'type' =>array('rule' => 'notEmpty','message' => 'This field cannot be left blank.'),
                        'engine' =>array('rule' => 'notEmpty','message' => 'This field cannot be left blank.'),
                    );
        
        
        public $hasMany = array(
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.owner_type'=>TiposGlobal::PRODUCT_TYPE_VEHICLE)),
                        'Season'=>array('foreignKey'=>'product_id','conditions'=>array('Season.parent_id'=>null))
                        );
                        
                        
                                            
      /*            
         function getRandomImages($random){
            if($type!=null){
              $options['conditions']=array('Season.owner_type'=>$type);
             }
              $options['order']=' rand()';
             // $options['offset']=rand(0,20000);  
            $options['limit']=$limit;  
           return $this->Rentacar->Season->find('all',);
            
        }                                    
       */          
       
        function setLocale($language, $country=null){
           // $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$language;
																
	if($country!=null ){
																
			$this->belongsTo['Location']['foreignKey']=false;
			$this->belongsTo['Location']['type']='INNER';
			//'conditions'=>array('Product.location_id=Location.id','Product.location_id=Location.id')
			$this->belongsTo['Location']['conditions'][0]='Product.location_id=Location.id';
			$this->belongsTo['Location']['conditions']['country']=$country;
		}
            
        }
        
        
}
