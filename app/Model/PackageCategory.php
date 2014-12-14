<?php  
class PackageCategory extends AppModel  
{  
	var $name = 'PackageCategory';
	var $displayField = 'category_name';
        var $hasMany = array('Package');
}
?>
