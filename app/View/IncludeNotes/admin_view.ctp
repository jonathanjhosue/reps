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
		<dt><?php echo __('Review Date'); ?></dt>
		<dd>
			<?php echo h($review['Review']['review_date']); ?>
			&nbsp;
		</dd>
	</dl>
<?php
 echo $this->RipsWeb->getInputI18nAll($indexI18n=0,
                                   $review['I18nKey'],
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_REVIEW,
                                    array('label'=>__('Review'),'type'=>'textarea', 'readonly'=>true));
 ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Review'), array('action' => 'edit', $review['Review']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Review'), array('action' => 'delete', $review['Review']['id']), null, __('Are you sure you want to delete # %s?', $review['Review']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?> </li>
		
	</ul>
</div>