<div class="reviews view">
<h2><?php  echo __('Review');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($review['Review']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($review['Product']['id'], array('controller' => 'products', 'action' => 'view', $review['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo h($review['Review']['staff']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('I18n Review'); ?></dt>
		<dd>
			<?php echo h($review['Review']['i18n_review']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review Date'); ?></dt>
		<dd>
			<?php echo h($review['Review']['review_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Review'), array('action' => 'edit', $review['Review']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Review'), array('action' => 'delete', $review['Review']['id']), null, __('Are you sure you want to delete # %s?', $review['Review']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related I18n Keys');?></h3>
	<?php if (!empty($review['I18nKey'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Language'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($review['I18nKey'] as $i18nKey): ?>
		<tr>
			<td><?php echo $i18nKey['id'];?></td>
			<td><?php echo $i18nKey['key'];?></td>
			<td><?php echo $i18nKey['language'];?></td>
			<td><?php echo $i18nKey['type'];?></td>
			<td><?php echo $i18nKey['value'];?></td>
			<td><?php echo $i18nKey['owner_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'i18n_keys', 'action' => 'view', $i18nKey['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'i18n_keys', 'action' => 'edit', $i18nKey['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'i18n_keys', 'action' => 'delete', $i18nKey['id']), null, __('Are you sure you want to delete # %s?', $i18nKey['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
