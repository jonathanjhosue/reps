<div id="viewIndex" class="hotels index">
    <h1><?php echo __('Packages');?> </h1>
   <p> 
       &nbsp;&nbsp;      
       <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'packages', 'action' => 'index',$idlocation)); 
         endif; ?>
    </span>
   </p>  
   <?php echo $this->element('search_package') ?>
   
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
 
        <ul class="listicons">
	<?php foreach ($packages as $package): ?>
            <li class="icon">
                <a  href="<?php echo $this->Html->url(array('action' => 'view', $package['Package']['product_id'])); ?>"  class="iframeBig">
                   
                            <?php 
                            if(isset($package['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$package['Image'][0]['id']."/200x140_".$package['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                            ?>
                    <span class="icontitle"><?php echo h($package['Product']['product_name']) ?>&nbsp;</span>  
                    <span class="icontext">
                            <?php echo h($package['PackageCategory']['category_name']); ?>      <br/>
                            <?php echo __('Code: ').h($package['Package']['code']); ?>      
                    </span>
                </a>
                      
             </li>
        <?php endforeach; ?>
        </ul>
	<p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

  <?php //pr( $packages); ?>