<div id="viewIndex" class="activities index">
   <h1><?php echo __('Activities in ');?>    <?php echo $this->element('location_name',  array('idlocation'=>$idlocation)); ?></h1>
   <p> 
       &nbsp;&nbsp;      
       <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'activities', 'action' => 'index',$idlocation)); 
         endif; ?>
    </span>
   </p>  
    <?php echo $this->element('search_activity') ?>
    
     <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
   
     <ul class="listicons">
	<?php foreach ($activities as $activity): ?>
            <li class="icon">
                <a  href="<?php echo $this->Html->url(array('action' => 'view', $activity['Activity']['product_id'])); ?>"  class="iframeBig">
                   
                            <?php 
                            if(isset($activity['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$activity['Image'][0]['id']."/200x140_".$activity['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                            ?>
                    <span class="icontitle"><?php echo h($activity['Product']['product_name']) ?>&nbsp;</span>  
                    <span class="icontext">
                            <?php echo h($activity['ActivityType']['activity_type_name']); ?>                           
                    </span>
                </a>
                      
             </li>
        <?php endforeach; ?>
        <?php if (count($activities)==0 ): ?>
             <li><?php echo __("Your search did not match any results. ") ?></li>
        <?php endif; ?>
        </ul>
        <p>
            <?php
           /* echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));*/
            ?>	
        </p>
        
        <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
        
        
        
</div>
