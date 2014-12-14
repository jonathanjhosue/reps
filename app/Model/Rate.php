<?php
class Rate extends AppModel  
{  
	var $name = 'Rate';
        
	var $belongsTo = array('Product','Season');
        
        var $primaryKey='id';//array('season_id','room_id');
        
  
      
       
        
}
?>
