<div class="images view">
<h2><?php  echo __('Image');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Name'); ?></dt>
		<dd>
			<?php echo h($image['Image']['image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($image['Image']['owner_type']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo h($image['Product']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['owner_id']); ?>
			&nbsp;
		</dd>
        </dl>
<?php echo $this->Html->image('image/'.$image['Image']['dir'].'/800x400_'.$image['Image']['image_name']);?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
	</ul>
</div>
