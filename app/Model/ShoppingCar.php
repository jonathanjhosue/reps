<?php
class ShoppingCar extends AppModel
{
	var $name = 'Season';
	
        
           public $validate = array(
                                'adults' =>array('rule'=>'paxVehicle','message' => 'maximum passenger'),
                                'childrens' =>array('rule'=>'paxVehicle','message' => 'maximum passenger'),
                                'infants' =>array('rule'=>'paxVehicle','message' => 'maximum passenger')
                            );
              
                var $dataArray=array();
                
              public function setDataArray($array){
                  $this->dataArray=$array;
              }  
              
      function paxVehicle($check) {
        $field = key($check);
        $value = $check[$field];

        $pax=$this->data[$this->alias]['adults']+$this->data[$this->alias]['children']+$this->data[$this->alias]['infants'];
        
        if($pax>$value) return false;

        return true;
    }
    
    
    
     function getRateByDate($date_start,$date_end,$product_id){
         $db = $this->getDataSource();
         $query = "select                
                    DATEDIFF(:datefinal,:dateinicio)-
                    (GREATEST(0,DATEDIFF(Season.date_start,:dateinicio)) +
                    GREATEST(0,DATEDIFF(:datefinal,Season.date_end)))
                    as days_in_season, Season.*,Rate.*
                from 
                    rates Rate
                    inner join seasons Season 
                            on(Season.id=Rate.season_id)
                where 
                    Season.product_id=:idproduct
                    and not(
                    (Season.date_start<:dateinicio and Season.date_end<:dateinicio)
                    or
                    (Season.date_start>:datefinal and Season.date_end>:datefinal)) 
                order by Season.parent_id";
          $values = array('dateinicio'=>$date_start,'datefinal'=>$date_end,'idproduct'=>$product_id);
          
          $result=$db->fetchAll($query,$values);
          $seasonkey=array();
          /*modificar dias para quitar las fechas de excepciones*/
          foreach($result as $i=>$item){
              $seasonkey[$item['Season']['id']]=$i;
              if($item['Season']['parent_id']){
                  if(isset($result[$seasonkey[$item['Season']['parent_id']]])){
                   $result[$seasonkey[$item['Season']['parent_id']]][0]['days_in_season']=  
                      $result[$seasonkey[$item['Season']['parent_id']]][0]['days_in_season']-$item[0]['days_in_season'];
                  }
              }              
              
          }
          
          /*limpiar temporadas sin dias */
          foreach($result as $i=>$item){
              if($item[0]['days_in_season']==0){
                  unset($result[$i]);
              }
          }
          
           return $result;
            
        }
    
}
?>
