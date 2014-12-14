<script src="liteaccordion.jquery.js"></script>
<?php	
   echo $this->Html->css('liteaccordion/liteaccordion.css');
   echo $this->Html->script('liteaccordion/liteaccordion.jquery.js');
    echo $this->Html->scriptBlock(
            '$(function() {
		$("#sliderProducts").liteAccordion({
                    containerWidth : 900,                   // fixed (px) 
                    containerHeight : 500,                  // fixed (px) 
                    headerWidth: 48,                        // fixed (px)  
                    activateOn : "mouseover",
                    theme : "ligth",                        // basic, dark, light, or stitch 
                    rounded : true,                        // square or rounded corners 
                    enumerateSlides : false,                // put numbers on slides 
                    linkable : true,
                    autoPlay : true,                       // automatically cycle through slides 
                    pauseOnHover : true,                   // pause on hover 
                    cycleSpeed : 6000                      // time between slide cycles  
                });                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>
<div id="contentProducts">
	<h1><?php echo __('Costa Rica Reps') ?></h2>
	<p>
            <?php echo __('Bienvenido al cat&aacute;logo de productos de Costa Rica Reps.') ?>
            <br/>
              <?php echo __('Conozca todos los detalles relacionados a cada producto que Costa Rica Reps pone a su disposici&oacute;n.') ?>		
	</p>
	<div id="sliderProducts">
             <ol>
                <li>
                    <h2><span><?php echo $this->Html->link(__('Lodging'), '/Hotels'); ?></span></h2>
                    <div>
                        <div class="title">
                            <h3>&#8594; <?php echo __('Lodging') ?></h3>
                            <p></p>
                        </div>
                        <?php echo $this->Html->link($this->Html->image('lodging.jpg', array('alt' => 'Lodging', 'width'=>'100%')), '/Hotels', array('escape'=>false, 'target' => '_blank'));?> 
                        
                        
                    </div>
                </li>
                <li>
                    <h2><span><?php echo $this->Html->link(__('Activities'), '/Activities'); ?></span></h2>
                    <div>
                         <div class="title">
                             <h3>&#8594;  <?php echo __('Activities') ?></h3>
                            <p></p>
                        </div>
                        <?php echo $this->Html->link($this->Html->image('activities.jpg', array('alt' => 'Activities', 'width'=>'100%')), '/Activities', array('escape'=>false, 'target' => '_blank'));?>
                    </div>
                </li>
                <li>
                    <h2><span><?php echo $this->Html->link(__('Packages'), '/Packages'); ?></span></h2>
                    <div>
                         <div class="title">
                            <h3>&#8594; <?php echo __('Packages') ?></h3>
                            <p></p>
                        </div>
                       <?php echo $this->Html->link($this->Html->image('packages.jpg', array('alt' => 'Packages', 'width'=>'100%')), '/Packages', array('escape'=>false, 'target' => '_blank'));?> 
                    </div>
                </li>
                <li>
                    <h2><span><?php echo $this->Html->link(__('Flights / Rent-a-Car'), '/Flights'); ?></span></h2>
                    <div>
                         <div class="title">
                            <h3>&#8594; <?php echo __('Flights') ?></h3>
                            <p></p>
                        </div>
                        <?php echo $this->Html->link($this->Html->image('flightscars.jpg', array('alt' => 'Flights', 'width'=>'100%')), '/Flights', array('escape'=>false, 'target' => '_blank')); ?>
                    </div>
                </li>
                
            </ol>
    <noscript>
    <p><?php echo __('Please enable JavaScript to get the full experience.') ?></p>
    </noscript>
            
        </div>
</div>