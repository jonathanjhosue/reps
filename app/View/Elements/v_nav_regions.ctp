<?php
	echo $this->Html->css('expandable_vertical_menu');
	echo $this->Html->script('expandable_vertical_menu.js');
?>

<div style="padding-top:4em; float:right;">
<ul id="v_nav">
	<?php 
		$contPanel = 0;
print_r($regions);
		foreach($regions as $region): ?>
		<li>
			<a onclick="panelexpand('panel_<?php echo $contPanel; ?>', '$totalPanel');return false;" class="span" href="#"><?php echo $region['Region']['name_region']; ?><img alt="" src="plus.png" id="pm<?php echo $contPanel; ?>"></a>
			<div id="panel_<?php echo $contPanel; $contPanel++; ?>" style="display:none;">
				<div id="pageNav">
					<div id="sectionLinks">
						<?php foreach ($region['Location'] as $location): 
								echo  $this->Html->link($location['location_name'], array('action'=>'index_by_location', 'id'=>$location['id'])); 
							endforeach;
						?>
					</div>
				</div>
			</div>
		</li>
	<?php endforeach;?>
</ul>
</div>
