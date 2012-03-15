 <div id="divReviews">
    <?php

    foreach($this->data['Review'] as $i=>$review){
        $titulo=($i+1).'=>'.$review['review_date'];
        echo '<h3><a href="#">'.$titulo.'</a></h3>';
        echo "<div>";
        echo $this->Form->input("Review.$i.id");
        echo $this->Form->input("Review.$i.staff");
        echo $this->Form->input("Review.$i.review_date",array('type'=>'hidden'));
        echo $this->RipsWeb->getInputI18nAll($indexI18n,
                        $review['I18nKey'],
                        'Review.'.$i.'.I18nKey',
                        TiposGlobal::I18N_TYPE_REVIEW,
                        array('label'=>__('Review'),'type'=>'textarea'));  

        //echo $this->Form->input('Review.'.$i.'.id',array('type'=>'hidden','name'=>"data[Action][DeleteReview]"));
        echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Review]['.$review['id'].']'));
        //echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$review['id']), null, __('Are you sure you want to delete # %s?', $review['id'])); 
        echo '</div>';
    }


            //echo $this->Form->input('review_date');
    ?>
</div>

<fieldset class="hotelsActions"> 
<?php   
    echo $this->Form->input('id',array('type'=>'hidden'));
    echo $this->Form->input('product_id',array('type'=>'hidden')); 


            echo $this->Form->input('Action.Add.Reviews_count',array('type'=>'text','label'=>__('New Reviews'),'maxlength'=>2,'div'=>'number','value'=>1));
            echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Reviews]'));


    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Reviews]'));
?>  
</fieldset> 