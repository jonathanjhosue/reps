<?php  

class Rentacar extends AppModel  
{  
	//var $scaffold = 'admin';
        

        var $primaryKey='product_id';
	
	var $name = 'Rentacar';
	var $belongsTo = array(
			'Product' => array('className' => 'Product')			
			); 
	var $hasMany = array(
                        'Vehicle',
                        'Image'=>array('foreignKey'=>'owner_id','conditions'=>array('Image.owner_type'=>TiposGlobal::PRODUCT_TYPE_RENTACAR)),
                        'AditionalService'=>array('foreignKey'=>'product_id'),
                        'Season'=>array('foreignKey'=>'product_id','conditions'=>array('Season.parent_id'=>null)),
                        'I18nKey'=>array(
                                'foreignKey'=>'owner_id',
                                'conditions'=>array('I18nKey.type'=>array(
                                                                TiposGlobal::I18N_TYPE_RENTACAR_SERVICENOTES
                                                          )                                                   
                                              )
                                   ),
                         'TipsAndSafety'=>array('foreignKey'=>'product_id'),

                         
                         'LocationRentacar'
                        );
        
        
       /*  public $hasAndBelongsToMany = array(
                                            'Activity' =>
                                                array(
                                                    'className'              => 'Activity',
                                                    'joinTable'              => 'relations',
                                                    'foreignKey'             => 'product_id1',
                                                    'associationForeignKey'  => 'product_id2',
                                                    'unique'                 => true,
                                                    //'conditions'             => array('type'=>TiposGlobal::PRODUCT_TYPE_ACTIVITY)
                                                    )
                                        );*/
        
        
         public $validate = array(
                                'name' =>array('message' => 'Please supply the name.','allowEmpty' => false)                                 
                            );
        
          function setLocale($language, $country=null){
            $this->hasMany['I18nKey']['conditions']['I18nKey.language']=$language;
																
	if($country!=null ){
																
			$this->belongsTo['Location']['foreignKey']=false;
			$this->belongsTo['Location']['type']='INNER';
			//'conditions'=>array('Product.location_id=Location.id','Product.location_id=Location.id')
			$this->belongsTo['Location']['conditions'][0]='Product.location_id=Location.id';
			$this->belongsTo['Location']['conditions']['country']=$country;
		}
            
        }
        
        
         
	
        
}
