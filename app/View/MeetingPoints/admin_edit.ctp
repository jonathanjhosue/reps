<div class="meetingPoints form">
<?php echo $this->Form->create('MeetingPoint');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Include Note'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->label('Id: '.$this->data['MeetingPoint']['id']."<br>");
                
		echo $this->Form->input("name",array('div'=>'fulltext'));
	?>
                
                
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MeetingPoint.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MeetingPoint.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Meeting Point'), array('action' => 'index'));?></li>
	</ul>
</div>
