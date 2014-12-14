<?php  
class Location extends AppModel  
{  
	var $name = 'Location';  
	var $displayField = 'location_name';
	var $belongsTo = 'Region'; 	
        var $hasMany = 'Product';
	//var $scaffold = 'admin';
	
	
	function getLocationsCountry($country=null){
		$options=array();
            if($country!=null){
              //$country= AppController()->getCountryOnly();
			  $options['conditions']=array('Location.country'=>$country);
             }
			 
              //$options['order']=' rand()';
             // $options['offset']=rand(0,20000);  
            //$options['limit']=$limit;  
           return $this->find('list',$options);
    }
    
    
    function findByCountry($country=null){
    return $this->find('list',array('conditions'=>array('Location.country'=>array($country,''))));
    
    }
	
}
