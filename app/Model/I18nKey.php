<?php  

class I18nKey extends AppModel  
{  
		
	var $name = 'I18nKey';
        
	var $displayField = 'value';  
        
        
           
        public $validate = array(
                                'language' => array(
                                                'rule'    => 'notEmpty',
                                                'message' => 'This field cannot be left blank.'
                                            )
                            );
}  
?>

