<div class="include_notes form">
<?php echo $this->Form->create('IncludeNote');?>
     <?php $indexI18n=0 ?> 
	<fieldset>
		<legend><?php echo __('Admin Add Include Notes'); ?></legend>
	<?php
        echo $this->Form->input('dummy',array('type'=>'hidden'));
		echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    array(),
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_INCLUDE_NOTE,
                                    array('label'=>__('IncludeNote'),'type'=>'text','div'=>'fulltext'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Include Notes'), array('action' => 'index'));?></li>
	</ul>
</div>
