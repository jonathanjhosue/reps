<?php  
class LocationRentacar extends AppModel  
{  
	var $name = 'LocationRentacar';  
	var $displayField = 'name';
	var $belongsTo = 'Rentacar'; 	
        var $hasMany = array(
            'RentacarPrice' =>array('foreignKey'  => 'location_id1')
                        );
	//var $scaffold = 'admin';
        
        
        public $validate = array(
                                'name' => array(
                                                'rule'    => 'notEmpty',
                                                'message' => 'This field cannot be left blank.'
                                            )
                            );
        
}
?>
