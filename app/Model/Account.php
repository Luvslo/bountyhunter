<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author obentvelzen
 */
class Account extends AppModel{

    public $useTable = 'accounts';

    public $hasMany = array(
        'Character' => array(
            'className' => 'Character',
            'foreignKey' => 'account_id'
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            if($this->data[$this->alias]['password'] == $this->data[$this->alias]['repeat_password']){
                App::import('Utility', 'Security');
                $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], 'blowfish', Configure::read('Security.salt'));
                unset($this->data[$this->alias]['repeat_password']);
                return true;
            }
        }
        return false;
    }
}

?>
