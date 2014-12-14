<ul class="activitylist">
        <?php foreach($activities as $activity): ?>	
        <li>      
            <?php 
                if(isset($activity['Image'][0]['image_name'])){
                    echo $this->Html->image("image/".$activity['Image'][0]['id']."/200x140_".$activity['Image'][0]['image_name']);
                }
                else{
                    echo $this->Html->image("nodisponible.jpg");
                }
            ?>
            <label ><?php echo  $activity['Product']['product_name'] ?> </label>
            <span><?php echo  $activity['Product']['Location']['location_name'] ?> </span>
            <br/>
            <p><?php echo  $this->I18nKeys->getKeyByType($activity['Product']['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?></p>
            <span class="spanlink">
                <?php  
                echo $this->Html->link(__('[Click here for details]'), array('controller' => 'activities', 'action' => 'view',$activity['Product']['id'])); 
                ?>
            </span>
        </li> 
        <?php endforeach; ?>	

</ul>    



	<?php //pr( $this->element('sql_dump')); ?>

<?php //pr($activity) ?>
