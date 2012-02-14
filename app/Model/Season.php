<?php
class Season extends AppModel
{
	var $name = 'Season';
	var $belongsTo = array('Hotel',
                               'Parent' => array(
                                    'className' => 'Season',
                                    'foreignKey' => 'parent_id'
                                )
                            );
        var $hasMany = array('RoomRate',
                              'SeasonException' => array(
                                    'className' => 'Season',
                                    'foreignKey' => 'parent_id'
                                )
                            );
        
           /*   public $validate = array(
                                'date_start' =>array('rule'=>'dateNotColision',
                                                    'message' => 'Date Colision'
                                                    )
                            );*/
              
                var $dataArray=array();
                
              public function setDataArray($array){
                  $this->dataArray=$array;
              }  
              
      function dateNotColision($check) {

            //foreach ($lista as $item1){
                foreach($this->dataArray as $row){
                    if(($row['date_start']>=$check && $check<=$row['date_end'])){
                        return false;
                    }
                }
            //}
//
        return true;
    }
}
?>
