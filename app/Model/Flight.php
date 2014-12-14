<?php
App::uses('AppModel', 'Model');
App::import('Model','TiposGlobal');
/**
 * Flight Model
 *
 * @property Product $Product
 * @property ActivityType $ActivityType
 */
class Flight extends AppModel {

	public $primaryKey = 'product_id';

	public $displayField = 'product_id';
	
	public $belongsTo = array(
                    'Product' => array(
                            'className' => 'Product',
                            'foreignKey' => 'product_id'
                    ),

                    'FlightFrom' => array(
                            'className' => 'FlightDestination',
                            'foreignKey' => 'leaving_from_id'
                    ),                     
                    
                    'FlightTo' => array(
                            'className' => 'FlightDestination',
                            'foreignKey' => 'flying_to_id'
                    )                    
		);
        
        var $hasMany = array(
                        'AditionalService'=>array('foreignKey'=>'product_id'),
                        /*'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_FLIGHT_SERVICENOTES
                                                          )                                                   
                                              )
                                   ),*/
                         'TipsAndSafety'=>array('foreignKey'=>'product_id'),
                        );
                        
                        
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
