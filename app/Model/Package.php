<?php
App::uses('AppModel', 'Model');
App::import('Model','TiposGlobal');
/**
 * Activity Model
 *
 * @property Product $Product
 * @property ActivityType $ActivityType
 */
class Package extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'product_id';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'product_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
                    'Product' => array(
                            'className' => 'Product',
                            'foreignKey' => 'product_id'
                    ),

                    'PackageCategory' => array(
                            'className' => 'PackageCategory',
                            'foreignKey' => 'package_category_id'
                    ),
                    'MeetingPoint' => array(
                            'className' => 'MeetingPoint',
                            'foreignKey' => 'meeting_point_id'
                    )
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
                                                    ),
                                            'Hotel' =>
                                                array(
                                                    'className'              => 'Hotel',
                                                    'joinTable'              => 'relations',
                                                    'foreignKey'             => 'product_id1',
                                                    'associationForeignKey'  => 'product_id2',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    ),
                                           'Extension' =>
                                                array(
                                                    'className'              => 'Package',
                                                    'joinTable'              => 'relations',
                                                    'foreignKey'             => 'product_id1',
                                                    'associationForeignKey'  => 'product_id2',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    ),  
                                            'ProductRelation' =>
                                                array(
                                                    'className'              => 'Product',
                                                    'joinTable'              => 'relations',
                                                    'foreignKey'             => 'product_id1',
                                                    'associationForeignKey'  => 'product_id2',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    ), 
                                            'IncludeNote' =>
                                                array(
                                                    'className'              => 'IncludeNote',
                                                    'joinTable'              => 'package_includes',
                                                    'foreignKey'             => 'package_id',
                                                    'associationForeignKey'  => 'include_id',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    )   
                                             /*'ExcludeNote' =>
                                                array(
                                                    'className'              => 'IncludeNote',
                                                    'joinTable'              => 'package_includes',
                                                    'foreignKey'             => 'package_id',
                                                    'associationForeignKey'  => 'include_id',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    )  */ 
                                        );
                
        
        var $hasMany = array(                        
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.owner_type'=>TiposGlobal::PRODUCT_TYPE_PACKAGE)),
                        'Season'=>array('foreignKey'=>'product_id','conditions'=>array('Season.parent_id'=>null)),
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                                                TiposGlobal::I18N_TYPE_PACKAGE_INFORMATION                         
                                                             
                                                          )                                                   
                                              )
                                   )   ,     			
			'Review' => array('foreignKey'=>'product_id','order'=> array('Review.staff'=>'DESC','Review.review_date'=>'DESC')),
                        'Itinerary'=>array('foreignKey'=>'package_id','order'=>'day_number')
                        
                        );
        
        
        public $validate = array(
                        'age_min' =>array('rule'    => 'numeric','message' => 'Please supply the age min.','allowEmpty' => true),
                        'age_max' =>array('rule'    => 'numeric','message' => 'Please supply the age max.','allowEmpty' => true),
                        'pax_min' =>array('rule'    => 'numeric','message' => 'Please supply the pax min.','allowEmpty' => true),
                        'pax_max' =>array('rule'    => 'numeric','message' => 'Please supply the pax max.','allowEmpty' => true),
                        'days' =>array('rule'    => 'numeric','message' => 'Please supply the days.','allowEmpty' => true),
                        'nights' =>array('rule'    => 'numeric','message' => 'Please supply the nights.','allowEmpty' => true), 
            
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
			$this->belongsTo['Location']['conditions'][0]="Product.location_id=Location.id";
			$this->belongsTo['Location']['conditions']['country']=array($country,'');
		}
            
        }
        
        function getExcludeNotes(){
            $options['joins'] = array(
                array('table' => 'package_includes',
                    'alias' => 'PackageInclude',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'PackageInclude.include_id = IncludeNote.id',
                    )
                )
            );
            $options['conditions'] = array(
                'PackageInclude.package_id' => null
            );
           return $this->IncludeNote->find('all',$options);
            
        }
}
