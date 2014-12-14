<div class="reviews form">
<?php echo $this->Form->create('Review');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Review'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('staff');
                
		 echo $this->RipsWeb->getInputI18nAll($indexI18n=0,
                                   $this->data['I18nKey'],
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_REVIEW,
                                    array('label'=>__('Review'),'type'=>'textarea'));
		echo $this->Form->input('review_date');
	?>
                
                
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Review.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Review.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index'));?></li>
	</ul>
</div>
