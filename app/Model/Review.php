<?php
App::import('Model','TiposGlobal');
class Review extends AppModel
{
	var $name = 'Review';
	var $belongsTo = array(
			'Product' => array('className' => 'Product')			
			);
        var $hasMany = array(
                               'I18nKey'=>array(
                                            'foreignKey'=>'owner_id',
                                            'conditions'=>array('I18nKey.type'=>array(
                                                                            TiposGlobal::I18N_TYPE_REVIEW                                                                           
                                                                    )

                                                        )
                                            )   
			);  

         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
