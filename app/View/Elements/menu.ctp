
<span class="preload1"></span>
<span class="preload2"></span> 

<ul  id="nav">
    
    <li class="top"><a href="/beta" class="top_link"><span><?php echo __('Inicio') ?></span></a></li>
            
    <li class="top"><a href="hotels" id="services" class="top_link"><span class="down"><?php echo __('Hotel') ?></span></a>
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'add')); ?></li>
            </ul>
    </li>      
    <li class="top"><a href="activities" id="services" class="top_link"><span class="down"><?php echo __('Activities') ?></span></a>
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'activities', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'activities', 'action' => 'add')); ?></li>
            </ul>
    </li>      
    <!--li class="top"><a href="#nogo1" class="top_link"><span>Rooms</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Regions</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Locations</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Images</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Reviews</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Hotel Categories</span></a></li-->
    
    <li class="top"><a href="packages" id="services" class="top_link"><span class="down"><?php echo __('Packages') ?></span></a>
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'packages', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'packages', 'action' => 'add')); ?></li>
            </ul>
    </li>

    
     <li class="top"><a href="rentacars" id="services" class="top_link"><span class="down"><?php echo __('Rentacars') ?></span></a>
            <ul class="sub">
                    <!--li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicles', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicles', 'action' => 'add')); ?></li>
            
            
            
                     <li><?php echo $this->Html->link(__('Rentacars'), array('admin' => true, 'prefix' => 'admin','controller' => 'rentacars', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul-->
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'rentacars', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'rentacars', 'action' => 'add')); ?></li>

                            <!--/ul>
                    </li-->
            </ul>
    </li>
    
    <li class="top"><a href="flights" id="services" class="top_link"><span class="down"><?php echo __('Flights') ?></span></a>
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'flights', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'flights', 'action' => 'add')); ?></li>
            </ul>
    </li>
    
    <li class="top"><a href="#nogo1" class="top_link"><span class="down"><?php echo __('User') ?></span></a>    
        
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'users', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'users', 'action' => 'add')); ?></li>
            </ul>
    </li>
    <li class="top"><a href="hotels" id="services" class="top_link"><span class="down"><?php echo __('Management') ?></span></a>
            <ul class="sub">
                <?php /*
                    <li><?php echo $this->Html->link(__('Images'), array('admin' => true, 'prefix' => 'admin','controller' => 'images', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('Hotel Images List'), array('admin' => true, 'prefix' => 'admin','controller' => 'images', 'action' => 'index',TiposGlobal::PRODUCT_TYPE_HOTEL)); ?> </li>
                                <li><?php echo $this->Html->link(__('Hotel Images Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'images', 'action' => 'add',TiposGlobal::PRODUCT_TYPE_HOTEL)); ?> </li>
                                <li><?php echo $this->Html->link(__('Activity Images List'), array('admin' => true, 'prefix' => 'admin','controller' => 'images', 'action' => 'index',TiposGlobal::PRODUCT_TYPE_ACTIVITY)); ?> </li>
                                <li><?php echo $this->Html->link(__('Activity Images Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'images', 'action' => 'add', TiposGlobal::PRODUCT_TYPE_ACTIVITY)); ?> </li>
                                
                            </ul>
                    </li>
                 * 
                 */
                ?>
                    <li><?php echo $this->Html->link(__('Reviews'), array('admin' => true, 'prefix' => 'admin','controller' => 'reviews', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'reviews', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'reviews', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <li><?php echo $this->Html->link(__('Hotel Categories'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotelCategories', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotelCategories', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotelCategories', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <li><?php echo $this->Html->link(__('Regions'), array('admin' => true, 'prefix' => 'admin','controller' => 'regions', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'regions', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'regions', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <li><?php echo $this->Html->link(__('Locations'), array('admin' => true, 'prefix' => 'admin','controller' => 'locations', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'locations', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'locations', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <li><?php echo $this->Html->link(__('Activity Types'), array('admin' => true, 'prefix' => 'admin','controller' => 'activityTypes', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'activityTypes', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'activityTypes', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <li><?php echo $this->Html->link(__('Package Category'), array('admin' => true, 'prefix' => 'admin','controller' => 'packageCategories', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'packageCategories', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'packageCategories', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                     <li><?php echo $this->Html->link(__('Package Include'), array('admin' => true, 'prefix' => 'admin','controller' => 'includeNotes', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'includeNotes', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'includeNotes', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                      <li><?php echo $this->Html->link(__('Meeting Point'), array('admin' => true, 'prefix' => 'admin','controller' => 'meetingPoints', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'meetingPoints', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'meetingPoints', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    
                    <li><?php echo $this->Html->link(__('Vehicle Category'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicleCategories', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicleCategories', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'vehicleCategories', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    <?php
                        /*
                    <li><?php //echo $this->Html->link(__('Aditional Services'), array('admin' => true, 'prefix' => 'admin','controller' => 'aditionalServices', 'action' => 'index'),array('class'=>'fly')); ?> 
                        
                        <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'aditionalServices', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'aditionalServices', 'action' => 'add')); ?> </li>
                                </ul
                        
                    </li>
                         *  * 
                         */
                         ?>
                         */
                    <li><?php echo $this->Html->link(__('Flight Destinations'), array('admin' => true, 'prefix' => 'admin','controller' => 'flightDestinations', 'action' => 'index'),array('class'=>'fly')); ?> 
                            <ul>
                                <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'flightDestinations', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'flightDestinations', 'action' => 'add')); ?> </li>
                                </ul>
                    </li>
                    
                    
            </ul>
    
    </li>
</ul>