<div class="ActivityType view">
<h2><?php  echo __('ActivityType');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($activitytype['ActivityType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Name'); ?></dt>
		<dd>
			<?php echo h($activitytype['ActivityType']['activity_type_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($activitytype['ActivityType']['category']); ?>
			&nbsp;
		</dd>
                
                
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit ActivityType'), array('action' => 'edit', $activitytype['ActivityType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete ActivityType'), array('action' => 'delete', $activitytype['ActivityType']['id']), null, __('Are you sure you want to delete # %s?', $activitytype['ActivityType']['activity_type_name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List ActivityType'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New ActivityType'), array('action' => 'add')); ?> </li>
	</ul>
</div>
