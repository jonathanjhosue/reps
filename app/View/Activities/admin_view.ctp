<div class="activities view">
<h2><?php  echo __('Activity');?></h2>
	<dl>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Product']['id'], array('controller' => 'products', 'action' => 'view', $activity['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activity Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['ActivityType']['id'], array('controller' => 'activity_types', 'action' => 'view', $activity['ActivityType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Min'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['age_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Max'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['age_max']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pax Min'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['pax_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pax Max'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['pax_max']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activity'), array('action' => 'edit', $activity['Activity']['product_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activity'), array('action' => 'delete', $activity['Activity']['product_id']), null, __('Are you sure you want to delete # %s?', $activity['Activity']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activity Types'), array('controller' => 'activity_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity Type'), array('controller' => 'activity_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
