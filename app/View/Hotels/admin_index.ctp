<?php echo $this->element('v_nav_regions'); ?>

<div class="hotels index" style="width:85%;">
	<h2>Hotels</h2>
		<h4>You can select a Location from the right menu to list the Hotels by Location, <?php echo $html->link('Create a New Hotel', array('action'=>'add')); ?>, or <?php echo $html->link('Manage Hotel Categories', array('controller'=>'HotelCategories','action'=>'index')); ?>.</h4>
</div>

