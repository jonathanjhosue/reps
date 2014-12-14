<span id="location_name">
    
    <?php  
   
    if($idlocation)
    {
        $datos= $this->requestAction('locations/view/'.$idlocation);
        echo $datos['Location']['location_name'].', ';
        echo $this->Html->link($datos['Region']['region_name'], array('action'=>'index', $datos['Location']['region_id']));
    }
         
    ?>
</span>
