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
					'90x45' => '90x45',
                                        '200x140' => '200x140',
					'800x400' => '800x400',
				),
                            'deleteOnUpdate'=>true,
				/*'thumbnailMethod'	=> 'php',*/
                            'maxSize'=>2597152,
                            'path'=>'{ROOT}webroot{DS}img{DS}{model}{DS}'
			)
		)
	);
        
        
        public $validate = array(
                                'image_name' => array(
                                                                                               
                                                 'isWritable' =>     array(
                                                                            'rule' => array('isWritable', false),
                                                                            'message' => 'File upload directory was not writable'
                                                                            ),
                                                  'isBelowMaxSize'=> array('rule' => array('isBelowMaxSize', 2697152, false),
                                                                       'message' => 'File is larger than the maximum filesize'
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
