<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class AppController extends Controller {

	//var $components = array('Auth', 'Session');
        
            public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => '/', 'action' => 'index')
        )
    );

    function beforeFilter() {
      
         if ($this->params['controller'] == 'pages') {
            $this->Auth->allow('*'); // or ('page1', 'page2', ..., 'pageN')
        }else{
              $this->Auth->allow('index', 'view');            
        }

    }
	
	/*function beforeFilter()
	{
		if (!$this->Session->check('language'))
		{
			$this->Session->write('language', 2); //English por default si el usuario no ha definido lenguage a�n.
		}
		
		//$this->Auth->allow('display','index','view', 'index_by_location');
	}*/
}
?>
