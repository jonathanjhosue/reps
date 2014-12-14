<?php
App::import('Model','TiposGlobal');
class IncludeNote extends AppModel
{
	var $name = 'IncludeNote';
	
        var $hasMany = array(
                               'I18nKey'=>array(
                                            'foreignKey'=>'owner_id',
                                            'conditions'=>array('I18nKey.type'=>array(
                                                                            TiposGlobal::I18N_TYPE_INCLUDE_NOTE                                                                           
                                                                    )

                                                        )
                                            )   
			);  

         function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
}
?>
