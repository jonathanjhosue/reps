<fieldset  id="fieldsetImages">
		
	<?php
        
        for($i=0;$i< $totalImages;$i++){
            
		$img='<div class="img">';
                 $img.= $this->Form->input("Image.$i.owner_id",array('type'=>'hidden'));
                 //$img.= $this->Form->input("Image.$i.image_name",array('type'=>'hidden', 'value'=>'Image'.($i+1)));
                 $img.= $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  $tipo));
                 $del='';
		if(isset($this->request->data['Image'][$i]['id'])){     
                    if(!isset($this->request->data['Image'][$i]['urlname'])){//validation                        
                        $this->request->data['Image'][$i]['urlname']=$this->request->data['Image'][$i]['image_name'];
                    }elseif(is_array($this->request->data['Image'][$i]['image_name'])){//save
                        $imageName=$this->request->data['Image'][$i]['image_name']['name'];
                        $this->request->data['Image'][$i]['urlname']=$imageName!=""?$imageName:$this->request->data['Image'][$i]['urlname'];
                    }
                        
                    $img.= '<label>'.$this->request->data['Image'][$i]['urlname'].'</label>';
                    $img.= $this->Form->input("Image.$i.id",array('type'=>'hidden'));
                    $img.= $this->Form->input("Image.$i.urlname",array('type'=>'hidden'));
                    
                    
                    $img.=$this->Html->image("image/".$this->request->data['Image'][$i]['id']."/90x45_".$this->request->data['Image'][$i]['urlname']);
                    
                    if($this->request->data['Image'][$i]['urlname']!=""){
                        $del.=' '.$this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Image]['.$this->request->data['Image'][$i]['id'].']', 'div'=>false));
             
                    }
                }
                $img.='</div>';
                
                 
                echo $this->Form->input("Image.$i.image_name",array( 'before'=>$img,'label'=>__('Image ').($i+1),'type'=>'file', 
                    'after'=>$del));
               // echo $this->Form->input('hotels/'.$hotel['Image'][$i]['image_name'], array('height' => '75px', 'style'=> 'padding-bottom:3px;'));
         }
	?>
</fieldset>