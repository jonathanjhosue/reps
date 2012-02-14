<?php
class RoomRate extends AppModel  
{  
	var $name = 'RoomRate';
        
	var $belongsTo = array('Room','Season');
        
        var $primaryKey='id';//array('season_id','room_id');
        
  
      
       
        
}
?>
