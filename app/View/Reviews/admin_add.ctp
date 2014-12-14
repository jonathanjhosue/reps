<div class="reviews form">
<?php echo $this->Form->create('Review');?>
     <?php $indexI18n=0 ?> 
	<fieldset>
		<legend><?php echo __('Admin Add Review'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('staff');
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    array(),
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

		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index'));?></li>
	</ul>
</div>
