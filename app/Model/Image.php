<?php
class Image extends AppModel
{
	var $name = 'Image';
	//var $belongsTo = 'Product';

	function isUploadedFile($params){
		$val = array_shift($params);
		if ((isset($val['error']) && $val['error'] == 0) || (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')) 
		{
			return is_uploaded_file($val['tmp_name']);
		}
		return false;
	}
}
?>
