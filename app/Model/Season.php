<?php
class Season extends AppModel
{
	var $name = 'Season';
	var $belongsTo = array('Product',
                               'Parent' => array(
                                    'className' => 'Season',
                                    'foreignKey' => 'parent_id'
                                )
                            );
        var $hasMany = array('Rate',
                              'SeasonException' => array(
                                    'className' => 'Season',
                                    'foreignKey' => 'parent_id'
                                )
                            );
        
           public $validate = array(
                                'date_start' =>array('rule'=>'dateNotCollision',
                                                    'message' => 'Date Collision'
                                                    ),
                                'date_end' =>array('rule'=>'dateNotCollision',
                                                    'message' => 'Date Collision'
                                                    )
                            );
              
                var $dataArray=array();
                
              public function setDataArray($array){
                  $this->dataArray=$array;
              }  
              
      function dateNotCollision($check) {
                $field = key($check);
                $value = $check[$field];
                foreach($this->dataArray as $row){                    
                    
                    /*contra otros season*/
                    if($this->data[$this->alias]['id']!=$row['id']){
                        /*contra el season padre*/
                        if(isset($this->data[$this->alias]['parent_id']) && $this->data[$this->alias]['parent_id']==$row['id']){
                           /* $date_start=$row['date_start']['year'].'-'.$row['date_start']['month'].'-'.$row['date_start']['day'];
                            $date_end=$row['date_end']['year'].'-'.$row['date_end']['month'].'-'.$row['date_end']['day'];

                            if($date_start>$value && $value>$date_end){
                                return false;
                            }
                           */ 
                        }else{
                            $date_start=$row['date_start']['year'].'-'.$row['date_start']['month'].'-'.$row['date_start']['day'];
                            $date_end=$row['date_end']['year'].'-'.$row['date_end']['month'].'-'.$row['date_end']['day'];

                            if($date_start<=$value && $value<=$date_end){
                                return false;
                            }
                        }
                        
                    }
                    /*contra excepciones*/
                    if(isset($row['SeasonException'])){
                            foreach($row['SeasonException'] as $rowexc){
                                if($this->data[$this->alias]['id']!=$rowexc['id']){ 
                                    $date_start=$rowexc['date_start']['year'].'-'.$rowexc['date_start']['month'].'-'.$rowexc['date_start']['day'];
                                    $date_end=$rowexc['date_end']['year'].'-'.$rowexc['date_end']['month'].'-'.$rowexc['date_end']['day'];
                                    if($date_start<$value && $value<$date_end){
                                        return false;
                                    }
                                    
                                }                              
                            } 
                    }
                    
                    
                }

        return true;
    }
    
    
    
     function getSeasons($product_id){
         $this->Behaviors->attach('Containable');
        //$this->Vehicle->bindModel(array('hasMany'=>array('Rate'=>array('foreignKey'=>'product_id'))));
        $contain=array('SeasonException');
        $this->contain($contain);
         
         
         $options=array('recursive'=>1);
             if($product_id!=null){
              $options['conditions']=array('Season.product_id'=>$product_id,'Season.parent_id'=>null);
             } 
           return $this->find('all',$options);
            
        }
    
}
?>
