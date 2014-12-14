<div class="package category view">
<h2><?php  echo __('Package Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($packagecategory['PackageCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Name'); ?></dt>
		<dd>
			<?php echo h($packagecategory['PackageCategory']['category_name']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Package Category'), array('action' => 'edit', $packagecategory['PackageCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Package Category'), array('action' => 'delete', $packagecategory['PackageCategory']['id']), null, __('Are you sure you want to delete # %s?', $packagecategory['PackageCategory']['category_name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Package Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
