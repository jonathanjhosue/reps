<?php 
if(isset($this->data['Product']['Rate'])){
    $rates=$this->data['Product']['Rate'];
    $rates=Set::combine($rates, '{n}.season_id', '{n}');
    $x= count($rates);    
   // echo '<tr><td>'.pr($rates).'</td></tr>'; 
?>

   <table class="Rate ui-widget">
            <thead class="ui-widget-header">
                <tr>
                    <th><?php echo __('Season') ?></th>
                    <th><?php echo __('Date Star') ?></th>
                    <th><?php echo __('Date End') ?></th>
                    <th><?php echo __('Rates (Dbl)') ?></th>
                    <th><?php echo __('Single.Sup') ?></th>
                    <th><?php echo __('Triple.Disc') ?></th>
                    <th><?php echo __('Child.D.'); ?></th>
                    <th><?php echo __('Infant.D.')  ?> </th>
                    <th><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody class="ui-widget-content">   
        <?php                         

        foreach($this->data['Season'] as $season): 
            $rate=array('id'=>'','single'=>'','double'=>'','triple'=>'','quadruple'=>'','senior'=>'','adult'=>'','student'=>'','child'=>'','infant'=>'');

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
                      echo $this->Form->text("Product.Rate.$x.double",array('class'=>'rateNumber','value'=>$rate['double'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.single",array('class'=>'rateNumber','value'=>$rate['single'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.triple",array('class'=>'rateNumber','value'=>$rate['triple'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.child",array('class'=>'rateNumber','value'=>$rate['child'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.infant",array('class'=>'rateNumber','value'=>$rate['infant'])).'</td>';
                echo '<td>';

            echo '</tr>';
            if(isset($season['SeasonException']))foreach($season['SeasonException'] as $n=>$exception): 
                $x++;
                $rate=array('id'=>'','single'=>'','double'=>'','triple'=>'','quadruple'=>'','senior'=>'','adult'=>'','student'=>'','child'=>'','infant'=>'');

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

                     echo $this->Form->text("Product.Rate.$x.double",array('class'=>'rateNumber','value'=>$rate['double'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.single",array('class'=>'rateNumber','value'=>$rate['single'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.triple",array('class'=>'rateNumber','value'=>$rate['triple'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.child",array('class'=>'rateNumber','value'=>$rate['child'])).'</td>'.
                    '<td>'.$this->Form->text("Product.Rate.$x.infant",array('class'=>'rateNumber','value'=>$rate['infant'])).'</td>';
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