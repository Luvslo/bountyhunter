<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    //only use containable behaviour
    public $recursive = -1;
    //use containable
    public $actsAs = array('Containable');

    //use auth component for user login
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Blowfish' => array(),
                'Form' => array(
                    'userModel' => 'Account',
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    )
                )
            ),
            'loginRedirect' => array('controller' => 'account', 'action' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'account', 'action' => 'index'),
            'loginAction' => array('controller' => 'account', 'action' => 'index')
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        //default deny all access without login unless specified differently
        $this->Auth->deny();
        //change layout when logged in
        if($this->Auth->loggedIn()){
            $this->layout = 'backend';
        }
    }

    public function check_admin(){
        if('admin' != $this->Session->read('Auth.User.role')){
            //make redirect if user is admin
        }
    }
}
