
    <?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla. 
	//incluye en el view las instrucciones JavaScript para el control del tabpanel.
	
        echo $this->Html->scriptBlock('
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                $( "#tabs" ).tabs(); 
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
    echo $this->Html->script('galleria/themes/classic/galleria.classic.min.js');       
     echo $this->Html->scriptBlock('
           $(function() {
            $("#gallery").galleria({
                    width: 800,
                    height: 330,
                    imageCrop: true,
                    imagePan:true,
                   /* imagePanSmoothness:12,*/
                     transition: "fade",
                     autoplay: 5500,
                     carousel:true,
                     imageMargin:0,
                    /* thumbnails:"empty",*/
              /*  extend: function(options) {

                        Galleria.log(this) // the gallery instance
                        Galleria.log(options) // the gallery options

                        // listen to when an image is shown
                        this.bind("image", function(e) {

                            Galleria.log(e) // the event object may contain custom objects, in this case the main image
                            Galleria.log(e.imageTarget) // the current image

                            // lets make galleria open a lightbox when clicking the main image:
                            $(e.imageTarget).click(this.proxy(function() {
                            this.openLightbox();
                            }));
                        });
                    }*/
                });
            })', array('allowCache'=>true,'safe'=>true,'inline'=>false));
	//echo $this->Html->scriptBlock($jsGalleryDec, array('allowCache'=>true,'safe'=>true,'inline'=>false));
	
	//echo $this->element('v_nav_regions',array('cache' => array('time' => '+1 day')));
	
	//print_r($_SESSION);
?>
<div class="activities view">    
    
     <div id="viewheader">
	<div id="gallery">          
            <?php for($i=0;$i<count($activity['Image']);$i++): 
            if($activity['Image'][$i]['image_name']) 
                echo '<a title="sdfs" alt="texto esxtesdf s" href="'.$this->request->webroot.'img/image/'.$activity['Image'][$i]['dir'].'/800x400_'.$activity['Image'][$i]['image_name'].'">'.
                    $this->Html->image('image/'.$activity['Image'][$i]['dir'].'/90x45_'.$activity['Image'][$i]['image_name']).
                    "</a>"; 
            endfor; ?>           	
        </div>     
        
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo $activity['Product']['product_name']; ?></h1>
    </div>
    
   <div id="tabs">

       				
    <p>
    <label><?php echo __('Category')?>:</label><?php echo $activity['ActivityType']['activity_type_name']; ?>&nbsp;&nbsp;&nbsp;  
    <label><?php echo __('Location')?>:</label><?php echo $activity['Product']['Location']['location_name'].', '.$activity['Product']['Location']['Region']['region_name']; ?>&nbsp;&nbsp;&nbsp;  

    <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'activities', 'action' => 'edit',$activity['Product']['id'])); 
         endif; ?>
    </span>
    </p>
 
    <ul>
        <li><a href="#tabs-1"><?php echo __('Overview'); ?></a></li>
        <li><a href="#tabs-2"><?php echo __('Fact Sheet'); ?></a></li>       
        <li><a href="#tabs-3"><?php echo __('Reviews'); ?></a></li>
        <li><a href="#tabs-4"><?php echo __('Rates'); ?></a></li>
    </ul>
    
    <div id="tabs-1"> 
        
        <label><?php echo __('Description') ?>:</label>
        <p class="texto">
        <?php echo  $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?>
        </p>

        <label><?php echo __('Directions') ?>:&nbsp;&nbsp;&nbsp;</label>
            <label><?php echo __('Gps Coordinates')?>:&nbsp;</label>
            <label>N:&nbsp;</label><?php echo $activity['Product']['gpslatitude']; ?>&nbsp; 
            <label>E:&nbsp;</label><?php echo $activity['Product']['gpslongitude']; ?>&nbsp;

            <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION); ?>
            </p>

        <div id="mapaGoogle">
        <?php if($activity['Product']['map']!=''): 
            $link= str_replace("&","&amp;",$activity['Product']['map']); 
            ?>
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $link.'&amp;output=embed' ?>">

            </iframe><br />
            <small><a href="<?php echo $link.'&amp;source=embed'; ?>" target="_blank" style="color:#0000FF;text-align:left"><?php echo __('Ver mapa más grande') ?></a></small>
        <?php endif; ?>
        </div>
    </div>
    
    <div id="tabs-2">         
        <p>
        <label><?php echo __('Duration') ?>:</label><span><?php echo   h($activity['Activity']['duration']);  ?>&nbsp;</span> &nbsp;&nbsp;&nbsp;  
        <label><?php echo __('Age Min') ?>:</label><span><?php echo  h($activity['Activity']['age_min']); ?>&nbsp;</span> &nbsp;&nbsp;&nbsp;
         <label><?php echo __('Age Max') ?>:</label><span><?php echo h($activity['Activity']['age_max']);  ?>&nbsp;</span> 
          <label><?php echo __('Operational Capacity:') ?>:</label>
          <label><?php echo __('Min # Pax') ?>:</label><span><?php echo h($activity['Activity']['pax_min']);  ?>&nbsp;</span>
          <label><?php echo __('Max # Pax') ?>:</label><span><?php echo h($activity['Activity']['pax_max']);  ?>&nbsp;</span>
        </p>

        <p>
            <label><?php echo __('Shedule')?>: </label> <span><?php echo $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_ACTIVITY_SHEDULE); ?>&nbsp;</span>												
        </p>
        
        <label><?php echo __('What to bring/wear:') ?>:</label>
         <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_ACTIVITY_WHATTOBRING); ?>
         </p>
            
        <label><?php echo __('Important notes:') ?>:</label>
         <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_ACTIVITY_NOTES); ?>
         </p>
         
    </div>
    <div id="tabs-3"> 
	  		
                <fieldset class="jfieldset">
                        <legend ><?php echo __('Staff Reviews') ?>:</legend>
                        <?php foreach($activity['Product']['StaffReview'] as $review): ?>		
                        <p class='review_texto'>                    
                            <q><?php echo  $this->I18nKeys->getKeyByType($review['I18nKey'],  TiposGlobal::I18N_TYPE_REVIEW); ?> </q>
                           <span><?php echo $review['review_date']; ?></span>
                        </p>  	
                        
                        <?php endforeach; ?>
                </fieldset>	

                <fieldset class="jfieldset">
                        <legend ><?php echo  __('Traveller Reviews')?>:</legend>

                        <?php foreach($activity['Product']['TravellerReview'] as $review): ?>	
                         <p class='review_texto'>                    
                            <q><?php echo  $this->I18nKeys->getKeyByType($review['I18nKey'],  TiposGlobal::I18N_TYPE_REVIEW); ?> </q>
                           <span><?php echo $review['review_date']; ?></span>
                        </p> 
                        <?php endforeach; ?>
                </fieldset>							
	</div>
    
<div id="tabs-4"> 
          		
    <table class="jtable" style="width: 100%;">
            <thead>
                    <tr>
                            <th><?php echo ('Season') ?></th>
                            <th><?php echo __('Seniors') ?></th>
                            <th><?php echo __('Adult') ?></th>
                            <th><?php echo __('Student w/I.D.') ?></th>
                            <th><?php echo __('Child') ?> <?php echo $activity['Activity']['child_age_min'].'-'.$activity['Activity']['child_age_max'].' y/o' ?></th>
                            <th><?php echo __('Infant')?> <?php echo $activity['Activity']['infant_age_min'].'-'.$activity['Activity']['infant_age_max'].' y/o' ?></th>
                    </tr>
            </thead>
                    <tbody>
                    <?php foreach($activity['Product']['Rate'] as $rate): ?>
                    <tr>
                            <td> <?php echo __('From: ').$rate['Season']['date_start'].' '.__('To: ').$rate['Season']['date_end']; ?></td>
                            <td><?php echo $rate['senior']; ?></td>
                            <td><?php echo $rate['adult']; ?></td>
                            <td><?php echo $rate['student']; ?></td>
                            <td><?php echo $rate['child']; ?></td>
                            <td><?php echo $rate['infant']; ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
    </table>
        <br/>
    <fieldset class="jfieldset">
        <legend class="tab"><?php echo __('Includes') ?>: </legend>

        <?php echo $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_ACTIVITY_INCLUDES);?>												
    </fieldset>
    <fieldset class="jfieldset">
        <legend class="tab"><?php echo __('Policies') ?>: </legend>

        <?php echo $this->I18nKeys->getKeyByType($activity['I18nKey'],  TiposGlobal::I18N_TYPE_ACTIVITY_POLICIES);?>												
    </fieldset>
            
</div>
  
   </div>
  <pre><?php print_r($activity); ?></pre>