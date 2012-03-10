<form id="FormSearch" method="post">
     <?php $selectCategory=isset($this->passedArgs['category'])?$this->passedArgs['category']:""; ?>
    <?php $selectSort=isset($this->passedArgs['sort'])?$this->passedArgs['sort']:""; ?>

     <?php echo $this->Form->input('Search.value',array('label'=> __('Search'),'value'=> $this->Session->read('Search.value'))); ?>
    <input value="<?php echo __('Search') ?>" type="submit" />
       <label><?php echo __('Sort by') ?></label>
       <ul>
           <li class="<?php echo $selectSort=="Product.product_name"?"active":"" ?>"><?php echo $this->Paginator->sort('Product.product_name', __('Name'));?></li>
           <li class="<?php echo $selectSort=="Category.name"?"active":"" ?>"><?php echo $this->Paginator->sort('Category.name', __('Category'));?></li>
       </ul>       
       <label><?php echo __('Filter') ?></label>
       <?php $categorias= $this->requestAction('HotelCategories/index'); ?>
       <ul>
           <li class="<?php echo $selectCategory==null?"active":"" ?>"> <?php echo $this->Paginator->link('None',array('category' => null)) ?></li>
           <?php foreach ($categorias as $categoria): ?>
           <li class="<?php echo $selectCategory==$categoria['HotelCategory']['id']?"active":"" ?>"> 
               
               <?php echo $this->Paginator->link($categoria['HotelCategory']['category_name'],array('category' => $categoria['HotelCategory']['id'])); ?> 
           </li>
         <?php endforeach; ?>           
       </ul>
  </form>

<?php //pr($this->data); ?>