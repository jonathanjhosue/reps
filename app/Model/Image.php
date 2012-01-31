<?php
class Image extends AppModel
{
	var $name = 'Image';
	//var $belongsTo = 'Product';
        
	var $actsAs = array(
		'Upload.Upload' => array(
			'image_name' => array(
				'fields' => array(
					'dir' => 'dir'
				),
				'thumbsizes' => array(
					'80x80' => '80x80',
					'640x480' => '640x480',
				),
				/*'thumbnailMethod'	=> 'php',*/
                            'maxSize'=>2697152,
                            'path'=>'{ROOT}webroot{DS}img{DS}{model}{DS}'
			)
		)
	);
/*
	function isUploadedFile($params){
		$val = array_shift($params);
		if ((isset($val['error']) && $val['error'] == 0) || (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')) 
		{
			return is_uploaded_file($val['tmp_name']);
		}
		return false;
	}*/
}
?>
