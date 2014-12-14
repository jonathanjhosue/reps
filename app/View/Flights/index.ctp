<?php

echo $this->Html->script('jPaginate.js');       
        echo $this->Html->scriptBlock('
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                
                $( "#divFlights" ).accordion({autoHeight: false,collapsible: true,active:false,header:"h3" });
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


<div class="flights view">
    
    
    <div id="viewheader">
        <h1><?php echo __('Flights'); ?></h1>
	         <div id="gallery">

        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_1.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_1.jpg'); ?>
         </a> 
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_2.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_2.jpg'); ?>
         </a>    
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_3.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_3.jpg'); ?>
         </a>    
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_4.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_4.jpg'); ?>
         </a> 
         <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_5.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_5.jpg'); ?>
         </a> 
        </div>     
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo __('List of Flights') ?></h1>
    </div>
     <div id="tabs">	
      
   <p> 
       &nbsp;&nbsp;      
       <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            //echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'flights', 'action' => 'index')); 
         endif; ?>
    </span>
   </p>  
   <ul>
            <li><a href="#tabs-1"><?php echo __('Flights'); ?></a></li>
            <li><?php echo $this->Html->link( __('Rent-a-Car'),array('controller'=>'vehicles','action'=>'index')); ?></li>
            
            <li><?php echo $this->Html->link( __('Ground Transfer'),array('controller'=>'groundTransfers','action'=>'index')); ?></li>

   </ul> 
   
      
   
  <div id="tabs-1"> 
      <?php //echo $this->element('search_vehicle') ?>
      <div id="divFlights">
       
        <?php 
        $categoflag="";
        $cont=0;
        foreach ($flights as $flight): 
             $linkhtml = array('action' => 'view', $flight['Flight']['product_id']);
        
              if (($categoflag == $flight['Flight']['type']) and ($cont>0)){
                  echo "<tr class='record' itemid=".$this->Html->url($linkhtml).">";
                  echo "<td>".$this->Html->link($flight['FlightFrom']['name'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($flight['FlightTo']['name'], $linkhtml,array('class'=>'iframe'))."</td>";
                  echo "<td>".$this->Html->link($flight['Flight']['oneway_fare'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['return_fare'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['flight_number'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['aircraft'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['duration'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['frequency'], $linkhtml,array('class'=>'iframe'))."</td>"; 
                  echo "<td>".$this->Html->link($flight['Flight']['capacity'], $linkhtml,array('class'=>'iframe'))."</a>"."</td>"; 
                  echo "</tr>"; 
                  ?>
               
               <?php 
                   } 
                   
           else if($categoflag != $flight['Flight']['type']){
                  $categoflag = $flight['Flight']['type'];
                echo "</tbody>";
                echo "</table>";
                  ?>
                <h3>                   		
		    <a href="#"><?php echo $categoflag;?></a>
                </h3>
          
          <table class="jtable tableVehicles">
                         <thead>
                             <tr>
                                <th><?php echo __('Leaving From') ?></th>
                                <th><?php echo __('Flying To') ?></th>
                                <th><?php echo __('One Way Fare') ?></th>
                                <th><?php echo __('Return Fare') ?></th>
                                <th><?php echo __('Flight Number') ?></th>
                                <th><?php echo __('Aircraft') ?></th>
                                <th><?php echo __('Duration') ?></th>
                                <th><?php echo __('Frequency') ?></th>
                                <th><?php echo __('Capacity') ?></th>
                             </tr>
                         </thead>  
                         <tbody>
                             <tr class="record"  itemid="<?php echo $this->Html->url($linkhtml) ?>">
                      <?php 
                     
                      ?>
                      <td><?php echo $this->Html->link($flight['FlightFrom']['name'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['FlightTo']['name'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['oneway_fare'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['return_fare'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['flight_number'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['aircraft'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['duration'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['frequency'], $linkhtml,array('class'=>'iframe')) ?></td>
                      <td><?php echo $this->Html->link($flight['Flight']['capacity'], $linkhtml,array('class'=>'iframe')) ?></td>
                      
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

  <?php  //  pr( $this->element('sql_dump')); 
         //  pr( $images);
  ?>