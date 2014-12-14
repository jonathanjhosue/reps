<div class="include_notes form">
<?php echo $this->Form->create('MeetingPoint');?>
     <?php $indexI18n=0 ?> 
	<fieldset>
		<legend><?php echo __('Admin Add Meeting Point'); ?></legend>
	<?php
        echo $this->Form->input("name",array('div'=>'fulltext'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Meeting Points'), array('action' => 'index'));?></li>
	</ul>
</div>
