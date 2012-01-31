<?php  
App::import('Model','TiposGlobal');
class Room extends AppModel  
{  
	var $name = 'Room';
	var $belongsTo = 'Hotel';
	var $hasMany = array(
			'RoomRate' => array('className' => 'RoomRate'),
                        'I18nKey'=>array(
                                            'foreignKey'=>'owner_id',
                                            'conditions'=>array('I18nKey.type'=>array(
                                                                            TiposGlobal::I18N_TYPE_ROOM_DESCRIPTION,
                                                                            TiposGlobal::I18N_TYPE_ROOM_INCLUDE
                                                                    )

                                                        )
                                            )   
			);  
	var $displayField = 'category';
        
         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
