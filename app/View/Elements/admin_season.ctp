<table class="Season">
    <thead>
        <tr>
            <th>
            </th>
            <th><?php echo __('Name') ?></th>
            <th><?php echo __('Date Star') ?></th>
            <th><?php echo __('Date End') ?></th>                    
            <th><?php echo __('Actions') ?>
            </th>
        </tr>
    </thead>
    <tbody>                        

        <?php
        if(isset($this->data['Season'])){
            $c=count($this->data['Season']);

            foreach($this->data['Season'] as $x=>$season){
                echo '<tr><td>'.
                        $this->Form->input("Season.$x.id",array('type'=>'hidden')).
                        $this->Form->input("Season.$x.product_id",array('type'=>'hidden'));
                        '</td>';     
                echo '<td>'.$this->Form->input("Season.$x.name",array('label'=>false,'div'=>false)).'</td>';    
                echo '<td>'.$this->Form->input("Season.$x.date_start",array('type'=>'date','label'=>false,'div'=>false)).'</td>';              
                echo '<td>'.$this->Form->input("Season.$x.date_end",array('type'=>'date','label'=>false,'div'=>false)).'</td>';   
                echo '<td>';   

                    echo $this->Form->submit(__('Add Exception'),array('name'=>'data[Action][Add][SeasonException]['.$season['id'].']','div'=>false));

                    echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Season]['.$season['id'].']', 'div'=>false));                                      

                    echo '</td>';

                echo '</tr>';

                if(isset($season['SeasonException'])){
                    foreach($season['SeasonException'] as $n=>$exepcion){
                        $c+=$n;
                        echo '<tr><td>'.
                        $this->Form->input("Season.$x.SeasonException.$n.id",array('type'=>'hidden', 'value'=>$exepcion['id']) ).
                        $this->Form->input("Season.$x.SeasonException.$n.product_id",array('type'=>'hidden', 'value'=>$exepcion['product_id'])).
                        $this->Form->input("Season.$x.SeasonException.$n.parent_id",array('type'=>'hidden', 'value'=>$exepcion['parent_id']));
                        '</td>';  
                        echo '<td>Exc&rarr;'.$this->Form->input("Season.$x.SeasonException.$n.name",array('label'=>false,'div'=>false, 'value'=>$exepcion['name'])).'</td>';    
                        echo '<td>'.$this->Form->input("Season.$x.SeasonException.$n.date_start",array('type'=>'date','label'=>false,'div'=>false, 'selected'=>$exepcion['date_start'])).'</td>';              
                        echo '<td>'.$this->Form->input("Season.$x.SeasonException.$n.date_end",array('type'=>'date','label'=>false,'div'=>false, 'selected'=>$exepcion['date_end'])).'</td>';   
                        echo '<td>';   

                            echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Season]['.$exepcion['id'].']', 'div'=>false));                                      

                            echo '</td>';

                        echo '</tr>';

                    }
                }

            }
        }
        ?>
</tbody>

</table>

      <fieldset class="hotelsActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                    ?> 
             <div class="buttongroup">
                 <?php 
                    echo $this->Form->input('Action.Add.Seasons_count',array('type'=>'text','label'=>__('New Seasons'),'maxlength'=>2,'div'=>'number','value'=>1));
                    echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Seasons]'));
                   ?> 
             </div>
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Seasons]'));
                    ?>  
        </fieldset>