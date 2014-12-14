<div class="AditionalService view">
<h2><?php  echo __('AditionalService');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Product_id'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['product_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daily Rack'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['price_daily_rack']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Daily Net'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['price_daily_net']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Weekly Rack'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['price_weekly_rack']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Weekly Net'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['price_weekly_net']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Price Type'); ?></dt>
		<dd>
			<?php echo h($aditionalService['AditionalService']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aditional Service'), array('action' => 'edit', $aditionalService['AditionalService']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aditional Service'), array('action' => 'delete', $aditionalService['AditionalService']['id']), null, __('Are you sure you want to delete # %s?', $aditionalService['AditionalService']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aditional Service'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aditional Service'), array('action' => 'add')); ?> </li>
	</ul>
</div>
