<?php  

class RentacarPrice extends AppModel  
{  
	var $name = 'RentacarPrice';
	var $belongsTo = array('LocationRentcar'=>array('foreignKey'=>'product_id1'));
	var $hasMany = array(
			//'RoomRate' => array('className' => 'Rate', 'foreignKey'=>'type_id'),
                        'LocationRentcar'=>array('foreignKey'=>'product_id2')   
			);  
	var $displayField = 'name';        
         
        
      /*   function setLocale($locale){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$locale;
            
        }
       * 
       */
        
        
        public $validate = array(                   
                    'rack'=>array('rule'    => 'numeric','message' => 'rack required'),
                    'net'=>array('rule'    => 'numeric','message' => 'net required')                                 
                );
}
?>
