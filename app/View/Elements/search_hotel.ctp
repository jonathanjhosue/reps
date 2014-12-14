<form id="FormSearch" method="post">

        <?php 
     $selectCategory=isset($this->passedArgs['category'])?$this->passedArgs['category']:"";
     $selectSort=isset($this->passedArgs['sort'])?$this->passedArgs['sort']:""; 
     $selectSortDirection=isset($this->passedArgs['direction'])?$this->passedArgs['direction']:""; 
    ?>
    <fieldset>
        <legend><?php echo __('Search') ?></legend>
        <?php echo $this->Form->input('Search.value',array('label'=> __('Search'),'value'=> $this->Session->read("Search.{$this->name}.value"))); ?>
        <input value="<?php echo __('Search') ?>" type="submit" />
    </fieldset>
    <fieldset>
        <legend><?php echo __('Sort by') ?></legend>      
        <ul class="sort">
           <li class="<?php echo $selectSort=="Product.product_name"?"active ".$selectSortDirection:"" ?>"><?php echo $this->Paginator->sort('Product.product_name', __('Name'));?></li>
           <li class="<?php echo $selectSort=="Category.name"?"active ".$selectSortDirection:"" ?>"><?php echo $this->Paginator->sort('Category.name', __('Category'));?></li>
       </ul>     
    </fieldset>
      <fieldset id="filter">
        <legend ><?php echo __('Filter') ?></legend> 
       <?php $categorias= $this->requestAction('HotelCategories/index'); ?>
       <ul class="filter" >
           <li class="<?php echo $selectCategory==null?"active":"" ?>"> <?php echo $this->Paginator->link('None',array('category' => null)) ?></li>
           <?php foreach ($categorias as $categoria): ?>
           <li class="<?php echo $selectCategory==$categoria['HotelCategory']['id']?"active":"" ?>"> 
               
               <?php echo $this->Paginator->link($categoria['HotelCategory']['category_name'],array('category' => $categoria['HotelCategory']['id'])); ?> 
           </li>
         <?php endforeach; ?>           
       </ul>
         </fieldset>
  </form>

<?php //pr($this->data); ?>