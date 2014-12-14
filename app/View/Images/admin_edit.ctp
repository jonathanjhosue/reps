<div class="images form">
<?php echo $this->Form->create('Image');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		$img='<div class="img">';
                 $img.= $this->Form->input("Image.owner_id",array('type'=>'hidden'));
                 $img.= $this->Form->input("Image.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
                 if(isset($this->request->data['Image']['id'])){     
                    if(!isset($this->request->data['Image']['urlname'])){//validation                        
                        $this->request->data['Image']['urlname']=$this->request->data['Image']['image_name'];
                    }elseif(is_array($this->request->data['Image']['image_name'])){//save
                        $imageName=$this->request->data['Image']['image_name']['name'];
                        $this->request->data['Image']['urlname']=$imageName!=""?$imageName:$this->request->data['Image']['urlname'];
                    }
                        
                    $img.= '<label>'.$this->request->data['Image']['urlname'].'</label>';
                    $img.= $this->Form->input("Image.id",array('type'=>'hidden'));
                    $img.= $this->Form->input("Image.urlname",array('type'=>'hidden'));
                    $img.=$this->Html->image("image/".$this->request->data['Image']['id']."/200x140_".$this->request->data['Image']['urlname']);
                                   }
                $img.='</div>';
                
                  echo $this->Form->input("Image.image_name",array( 'before'=>$img,'label'=>__('Image '),'type'=>'file'));
                echo __("Product Name: ").h($this->request->data['Product']['product_name']);
                ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index'));?></li>
	</ul>
</div>
