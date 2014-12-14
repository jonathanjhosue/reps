<div class="includeNotes form">
<?php echo $this->Form->create('IncludeNote');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Include Note'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->label('Include Id: '.$this->data['IncludeNote']['id']."<br><br>");
                
		 echo $this->RipsWeb->getInputI18nAll($indexI18n=0,
                                   $this->data['I18nKey'],
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IncludeNote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IncludeNote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Include Notes'), array('action' => 'index'));?></li>
	</ul>
</div>
