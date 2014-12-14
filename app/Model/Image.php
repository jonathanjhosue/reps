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
				'thumbnailMethod'	=> 'php',
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
        
        
         function getRandomImages($limit=5, $type=null){
           /* $options['joins'] = array(
                array('table' => 'package_includes',
                    'alias' => 'PackageInclude',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'PackageInclude.include_id = IncludeNote.id',
                    )
                )
            );
            $options['conditions'] = array(
                'PackageInclude.package_id' => null
            );*/
              /*como no son muchas fotos de rentacars se hace así*/
             if($type!=null){
              $options['conditions']=array('Image.owner_type'=>$type);
             }
              $options['order']=' rand()';
             // $options['offset']=rand(0,20000);  
            $options['limit']=$limit;  
           return $this->find('all',$options);
            
        }
        
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
