<div id="HotelIndex" class="hotels index">
    <h1><?php echo __('Hotels in ');?>    <?php echo $this->element('location_name',  array('idlocation'=>$idlocation)); ?></h1>
   <p> 
       &nbsp;&nbsp;      
       <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'index',$idlocation)); 
         endif; ?>
    </span>
   </p>  
   <?php echo $this->element('search_hotel') ?>
 
        <ul class="listicons">
	<?php foreach ($hotels as $hotel): ?>
            <li class="icon">
                <a  href="<?php echo $this->Html->url(array('action' => 'view', $hotel['Hotel']['product_id'])); ?>">
                   
                            <?php 
                            if(isset($hotel['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$hotel['Image'][0]['id']."/200x140_".$hotel['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                            ?>
                    <span class="icontitle"><?php echo h($hotel['Product']['product_name']) ?>&nbsp;</span>  
                    <span class="icontext">
                            <?php echo h($hotel['HotelCategory']['category_name']); ?>                           
                    </span>
                </a>
                      
             </li>
        <?php endforeach; ?>
        </ul>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

  <?php //pr( $hotels); ?>