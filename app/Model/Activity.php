<?php
App::uses('AppModel', 'Model');
App::import('Model','TiposGlobal');
/**
 * Activity Model
 *
 * @property Product $Product
 * @property ActivityType $ActivityType
 */
class Activity extends AppModel {
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
		'ActivityType' => array(
			'className' => 'ActivityType',
			'foreignKey' => 'activity_type_id'
		)
	);
        
        
        
        var $hasMany = array(                        
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.owner_type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)),
                        'Season'=>array('foreignKey'=>'product_id','conditions'=>array('Season.parent_id'=>null)),
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                                                TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION,
                                    
                                    
                                                                TiposGlobal::I18N_TYPE_ACTIVITY_INCLUDES,
                                                                TiposGlobal::I18N_TYPE_ACTIVITY_NOTES,
                                                                TiposGlobal::I18N_TYPE_ACTIVITY_POLICIES,
                                                                TiposGlobal::I18N_TYPE_ACTIVITY_SHEDULE,
                                                                 TiposGlobal::I18N_TYPE_ACTIVITY_WHATTOBRING
                                                          )                                                   
                                              )
                                   )   ,     			
			'Review' => array('foreignKey'=>'product_id','order'=> array('Review.staff'=>'DESC','Review.review_date'=>'DESC'))	
                        
                        );
        
          function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
