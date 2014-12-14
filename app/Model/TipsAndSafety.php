<?php  

class TipsAndSafety extends AppModel  
{  
	var $name = 'TipsAndSafety';
	var $belongsTo = array('Rentacar'=>array('foreignKey'=>'product_id'),
			       'Flight'=>array('foreignKey'=>'product_id'));
	var $hasMany = array(
			//'RoomRate' => array('className' => 'Rate', 'foreignKey'=>'type_id'),
                        'I18nKey'=>array(
                                            'foreignKey'=>'owner_id',
                                            'conditions'=>array('I18nKey.type'=>array(
                                                                            TiposGlobal::I18N_TYPE_RENTACAR_TIPSANDSAFETY
                                                                    )

                                                        ),
                                            'dependent'=> true
                                            )   
			);          
        
         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
