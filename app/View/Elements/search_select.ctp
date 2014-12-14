<?php
if (!isset($id)){
    $id='1';
}
if (!isset($collection)){
    $collection=array();
}
 echo $this->Html->scriptBlock(
            '$(function() {
                              
                  registrarDLSelectorFilter("#selectfilter'.$id.'","input:text#textfilter'.$id.'","input:checkbox#chkSelectedOnly'.$id.'");
                
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
 //arreglo desde db
 $collectionSelected=isset($this->data[$id])?Set::combine( $this->data[$id],"{n}/product_id","{n}/product_id"):array();
 //arreglo enviado
 $seleccionEnviada=isset($this->data[$id][$id])?$this->data[$id][$id]:array();
 /*if(isset($this->data[$id][$id])){
     $collectionSelected=merge($collectionSelected,$this->data[$id][$id]);
 }*/
 /*pr($collection);
 pr($collectionSelected);
 pr($seleccionEnviada);*/
?>

<div class="search_select">
    <input  id="chkSelectedOnly<?php echo $id ?>" type="checkbox">
<label for="chkSelectedOnly<?php echo $id ?>"><?php echo __("Show only selected"); ?> </label>

<label for="textfilter<?php echo $id ?>"><?php echo __("Filter"); ?></label>
<input class="filter" id="textfilter<?php echo $id ?>"  name="textfilter" type="text">  
<select id="selectfilter<?php echo $id ?>" name="data[<?php echo $id ?>][<?php echo $id ?>][]" multiple="" size="14" style="">
    <?php 
    $optgroup='';
    
    foreach ($collection as $row): 
        
        $categoria=(isset($row['HotelCategory']))?$row['HotelCategory']['category_name']: 
                   (isset($row['ActivityType'])?$row['ActivityType']['category']:'');  
        $row_optgroup='';
        if(isset($row['PackageCategory'])){
            $row_optgroup=$row['Extension']['tour_location'].':'.$row['PackageCategory']['category_name'];
        }else{
            $row_optgroup=$row['Region']['country'].':'.$row['Region']['region_name'].':'.$row['Location']['location_name'].':'.$categoria;
        }    
        
        //$row_optgroup=$row['Region']['country'].':'.$row['Region']['region_name'].':'.$row['Location']['location_name'].':'.$row['PackageCategory']['category'];
        if($row_optgroup!=$optgroup):
            if($optgroup!=''){
                echo '</optgroup>';
            }
        ?>
        <optgroup label="<?php echo $row_optgroup ?>" class="">
        <?php 
        endif;
        ?>     
            <option value="<?php echo $row['Product']['id'] ?>" <?php echo ((false!==array_search($row['Product']['id'],$collectionSelected))||(false!==array_search($row['Product']['id'],$seleccionEnviada)))?'selected':'' ?> >
                <?php echo $row['Product']['product_name'] ?>
            </option>
        <?php
        $optgroup=$row_optgroup;
        ?>     

    <?php endforeach; 
        if($optgroup!=''): ?>
        </optgroup>
        <?php 
        endif;
    ?>
</select>

</div>

