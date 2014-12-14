<div class="Location view">
<h2><?php  echo __('Location');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['location_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region Name'); ?></dt>
		<dd>
			<?php echo h($location['Region']['region_name']); ?>
			&nbsp;
		</dd>
                
                
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['location_name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Location'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
	</ul>
</div>
