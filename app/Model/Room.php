<?php  
App::import('Model','TiposGlobal');
class Room extends AppModel  
{  
	var $name = 'Room';
	var $belongsTo = 'Hotel';
	var $hasMany = array(
			//'RoomRate' => array('className' => 'Rate', 'foreignKey'=>'type_id'),
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
        
         public $validate = array(
                                'category' => array(
                                                'rule'    => 'notEmpty',
                                                'message' => 'This field cannot be left blank.'
                                                   ),
                                'count'=>array(
                                    'numeric' => array('rule'    => 'numeric',
                                                    'message' => 'Please supply the number of rooms.'
                                                   ),
                                    'notEmpty' => array( 'rule'    => array('comparison', '>', 0),
                                                    'message' => 'Please supply the number of rooms'
                                                   )                                    
                                         )
                            );
        
         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
