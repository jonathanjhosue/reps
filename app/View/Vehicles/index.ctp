<?php

echo $this->Html->script('jPaginate.js');       
	echo $this->Html->script('fancybox/jquery.fancybox-1.3.4.pack.js');  
        echo $this->Html->css('fancybox/jquery.fancybox-1.3.4.css');
        echo $this->Html->scriptBlock('
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                
                $( "#divVehicles" ).accordion({autoHeight: false,collapsible: true,active:false,header:"h3" });
                $( "#tabs" ).tabs({
                    select: function(event, ui) {
                        var url = $.data(ui.tab, "load.tabs");
                        if( url ) {
                            location.href = url;
                            return false;
                        }
                        return true;
                    }
                }); 
                $( "#tabsRate" ).tabs(); 
                
                $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 650,
                     "height" : 560
                });
                
                $("tr.record").bind("click", function(){
                    $.fancybox({
                        "width" : 650,
                        "height": 560,
                        "type"  : "iframe",
                        "href"  : $(this).attr("itemid")
                    });

                });


                $("#ulHotels").jPaginate(    {cookies:false,items: 6, pagination_class: "paginateHotels",next:"'.__('Next').'",previous:"'.__('Previous').'"});
                $("#ulActivities").jPaginate({cookies:false,items: 6, pagination_class: "paginateActivities",next:"'.__('Next').'",previous:"'.__('Previous').'"});
                $("#ulExtensions").jPaginate({cookies:false,items: 6, pagination_class: "paginateExtensions",next:"'.__('Next').'",previous:"'.__('Previous').'"});
                $("#divItinerary").jPaginate({cookies:false,items: 10,pagination_class: "paginateItinerary",next:"'.__('Next').'",previous:"'.__('Previous').'"});  
                /*$("#divItinerary").easyPaginate({
                    step: 5,
                    nextprev:false,
                    numeric:true
                }); */
                            
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
                    debug:false,                 
                     transition: "fade",
                     autoplay: 5500,
                     carousel:true,
                     imageMargin:0            
                });
            })', array('allowCache'=>true,'safe'=>true,'inline'=>false));

    
?>


<div class="vehicles view">
    
    
    <div id="viewheader">
        <h1><?php echo __('Rent-a-Car'); ?></h1>
	<div id="gallery">
            
            <?php 
            for($i=0;$i<count($images);$i++): 
            if($images[$i]['Image']['image_name']) 
                echo '<a title="" alt="texto" href="'.$this->request->webroot.'img/image/'.$images[$i]['Image']['dir'].'/800x400_'.$images[$i]['Image']['image_name'].'">'.
                    $this->Html->image('image/'.$images[$i]['Image']['dir'].'/90x45_'.$images[$i]['Image']['image_name']).
                    "</a>"; 
            endfor; ?>           	
        </div>     
        
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo __('List of vehicles') ?></h1>
    </div>
     <div id="tabs">	
      
   <p> 
       &nbsp;&nbsp;      
       <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicles', 'action' => 'index')); 
         endif; ?>
    </span>
   </p>  
   <ul>
            <li><a href="#tabs-1"><?php echo __('Rent-a-Car'); ?></a></li>
            <li><?php echo $this->Html->link( __('Flights'),array('controller'=>'flights','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link( __('Ground Transfer'),array('controller'=>'groundTransfers','action'=>'index')); ?></li>
           
    </ul> 
   
      
   
  <div id="tabs-1"> 
      <?php //echo $this->element('search_vehicle') ?>
      <div id="divVehicles">
      
      
      <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
       
        <?php 
        $categoflag="";
        $cont=0;
        foreach ($vehicles as $vehicle): 
             $linkhtml = array('action' => 'view', $vehicle['Vehicle']['product_id']);
        
              if (($categoflag == $vehicle['VehicleCategory']['name']) and ($cont>0)){
                  echo "<tr class='record' itemid=".$this->Html->url($linkhtml).">";
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['subcategory'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['type'], $linkhtml,array('class'=>'iframe'))."</td>";
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['engine'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['fuel'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['transmission'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['doors'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['pax'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($vehicle['Vehicle']['luggage'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  
                  
                  echo "</tr>"; 
                  ?>
               
               <?php 
                   } 
                   
           else if($categoflag != $vehicle['VehicleCategory']['name']){
                  $categoflag = $vehicle['VehicleCategory']['name'];
                echo "</tbody>";
                echo "</table>";
                  ?>
                <h3>                   		
		    <a href="#"><?php echo $categoflag;?></a>
                </h3>
          
          <table class="jtable tableVehicles">
                         <thead>
                             <tr>
                                <th><?php echo __('Category') ?></th>
                                <th><?php echo __('Vehicle Type') ?></th>
                                <th><?php echo __('Engine') ?></th>
                                <th><?php echo __('Fuel') ?></th>
                                <th><?php echo __('Transmission') ?></th>
                                <th><?php echo __('Doors') ?></th>
                                <th><?php echo __('Pax Capacity') ?></th>
                                <th><?php echo __('Luggage') ?></th>
                             </tr>
                         </thead>  
                         <tbody>
                             <tr class="record"  itemid="<?php echo $this->Html->url($linkhtml) ?>">
                      <?php 
                     
                      ?>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['subcategory'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['type'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['engine'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['fuel'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['transmission'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['doors'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['pax'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($vehicle['Vehicle']['luggage'], $linkhtml,array('class'=>'iframe')) ?></td>
                      
                             </tr>
                  
               <?php
               } 
               $cont=$cont+1;
               endforeach; 
              ?>
                             
               </tbody>
               </table>
      </div>
   </div>
   
   
   
       <p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

  <?php  pr( $this->element('sql_dump')); 
  pr( $images);
  ?>