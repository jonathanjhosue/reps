<?php  
App::import('Model','TiposGlobal');
class Itinerary extends AppModel  
{  
	var $name = 'Itinerary';
	var $belongsTo = 'Package';
	var $hasMany = array(
			//'RoomRate' => array('className' => 'Rate', 'foreignKey'=>'type_id'),
                        'I18nKey'=>array(
                                            'foreignKey'=>'owner_id',
                                            'conditions'=>array('I18nKey.type'=>array(
                                                                            TiposGlobal::I18N_TYPE_ITENERARY_HEADLINE,
                                                                            TiposGlobal::I18N_TYPE_ITENERARY_DESCRIPTION
                                                                    )

                                                        )
                                            )   
			);  
	var $displayField = 'day_number';        
         
        
         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
