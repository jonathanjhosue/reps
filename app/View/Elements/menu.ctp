<span class="preload1"></span>
<span class="preload2"></span> 

<ul  id="nav">
    
    <li class="top"><a href="/beta" class="top_link"><span>Inicio</span></a></li>
            
    <li class="top"><a href="hotels" id="services" class="top_link"><span class="down">Hotel</span></a>
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'add')); ?></li>
            </ul>
    </li>      
    <!--li class="top"><a href="#nogo1" class="top_link"><span>Rooms</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Regions</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Locations</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Images</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Reviews</span></a></li>
    <li class="top"><a href="#nogo1" class="top_link"><span>Hotel Categories</span></a></li-->
    <li class="top"><a href="#nogo1" class="top_link"><span class="down">User</span></a>    
        
            <ul class="sub">
                    <li><?php echo $this->Html->link(__('List'), array('admin' => true, 'prefix' => 'admin','controller' => 'users', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('Add'), array('admin' => true, 'prefix' => 'admin','controller' => 'users', 'action' => 'add')); ?></li>
            </ul>
    </li>
    <li class="top"><a href="#..." class="top_link"><span>...</span></a></li>
</ul>