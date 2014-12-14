<?php 
//o tiene rate el vehiculo o el rentacar
if(isset($this->data['Product']['Rate'])){
    $rates=$this->data['Product']['Rate'];
    $rates=Set::combine($rates, '{n}.season_id', '{n}');
    $x= count($rates);    
    $isSeasonsRentacar=false;
   // echo '<tr><td>'.pr($rates).'</td></tr>'; 
    
    $seasons=array();
    //usa temporadas del vehiculo o del rentacar
    if(isset($this->data['Season']) && count($this->data['Season'])>0){
        $seasons=$this->data['Season'];
        
    }elseif(isset($seasonsRentacar) && count($seasonsRentacar)>0){
        $isSeasonsRentacar=true;
        foreach ($seasonsRentacar as $i =>$item){
                $item['Season']['SeasonException']=$item['SeasonException']; 
                $seasons[$i]=$item['Season'];
        }
                
    }
      // pr($seasonsRentacar);
?>

   <table class="Rate ui-widget">
            <thead class="ui-widget-header">
                <tr>
                    <th><?php echo __('Season') ?></th>
                    <th><?php echo __('Date Star') ?></th>
                    <th><?php echo __('Date End') ?></th>
                    <th><?php echo __('Daily Rack') ?></th>
                    <th><?php echo __('Daily Net') ?></th>
                    <th><?php echo __('Weekly Rack') ?></th>
                    <th><?php echo __('Weekly Net'); ?></th>
                    <th><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody class="ui-widget-content">   
        <?php                         

        foreach($seasons as $season): 
           $rate=array('id'=>'','daily_rack'=>'','daily_net'=>'','weekly_rack'=>'','weekly_net'=>'');
        
        if(isset($rates[$season['id']])){
            $rate=$rates[$season['id']];                         
        }               
        
            echo '<tr><td>';                            

            echo $season['name'];
                '</td>';
            echo '<td>'.$this->RipsWeb->getStringFromDate($season['date_start']).'</td>'.
            '<td>'.$this->RipsWeb->getStringFromDate($season['date_end']).'</td>';                                

                echo '<td>'.$this->Form->input("Product.Rate.$x.id",array('type'=>'hidden','value'=>$rate['id']))
                            .$this->Form->input("Product.Rate.$x.season_id",array('type'=>'hidden','value'=>$season['id']))
                        .$this->Form->input("Product.Rate.$x.product_id",array('type'=>'hidden','value'=>$season['product_id']));
                if($isSeasonsRentacar){
                     echo $this->Form->input("Product.Rate.$x.type_id",array('type'=>'hidden','value'=>$this->data['Vehicle']['product_id']));
                }
                echo $this->Form->text("Product.Rate.$x.daily_rack",array('class'=>'rateNumber','value'=>$rate['daily_rack'])).'</td>'.
                '<td>'.$this->Form->text("Product.Rate.$x.daily_net",array('class'=>'rateNumber','value'=>$rate['daily_net'])).'</td>'.
                '<td>'.$this->Form->text("Product.Rate.$x.weekly_rack",array('class'=>'rateNumber','value'=>$rate['weekly_rack'])).'</td>'.
                '<td>'.$this->Form->text("Product.Rate.$x.weekly_net",array('class'=>'rateNumber','value'=>$rate['weekly_net'])).'</td>';
               
                echo '<td>';

            echo '</tr>';
            if(isset($season['SeasonException']))foreach($season['SeasonException'] as $n=>$exception): 
                $x++;
                $rate=array('id'=>'','daily_rack'=>'','daily_net'=>'','weekly_rack'=>'','weekly_net'=>'');

                if(isset($rates[$exception['id']])){
                    $rate=$rates[$exception['id']];                         
                }                        
                    echo '<tr><td>';                            


                    echo 'Exc&rarr;'.$exception['name'];
                        '</td>';
                    echo '<td>'.$this->RipsWeb->getStringFromDate($exception['date_end']).'</td>'.
                    '<td>'.$this->RipsWeb->getStringFromDate($exception['date_end']).'</td>';


                        echo '<td>'.$this->Form->input("Product.Rate.$x.id",array('type'=>'hidden','value'=>$rate['id']))
                                    .$this->Form->input("Product.Rate.$x.season_id",array('type'=>'hidden','value'=>$exception['id']))
                                .$this->Form->input("Product.Rate.$x.product_id",array('type'=>'hidden','value'=>$exception['product_id']));                                   
                    if($isSeasonsRentacar){
                        echo $this->Form->input("Product.Rate.$x.type_id",array('type'=>'hidden','value'=>$this->data['Vehicle']['product_id']));
                    }
                     echo $this->Form->text("Product.Rate.$x.daily_rack",array('class'=>'rateNumber','value'=>$rate['daily_rack'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.daily_net",array('class'=>'rateNumber','value'=>$rate['daily_net'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.weekly_rack",array('class'=>'rateNumber','value'=>$rate['weekly_rack'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.weekly_net",array('class'=>'rateNumber','value'=>$rate['weekly_net'])).'</td>';
                        echo '<td>';

                    echo '</tr>';

                endforeach;
                $x++;

        endforeach;

        ?>

        </tbody>
    </table>               

<?php
}
 
?>


<fieldset class="hotelsActions"> 
    <?php   
        echo $this->Form->input('id',array('type'=>'hidden'));
        echo $this->Form->input('product_id',array('type'=>'hidden'));    
        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rates]'));
    ?>  
</fieldset>