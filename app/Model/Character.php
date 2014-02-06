<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Character
 *
 * @author obentvelzen
 */
class Character extends AppModel{
    public $belongsTo = array(
       'Account' => array(
           'className' => 'Account',
           'foreignKey' => 'id'
       )
    );

    public $hasOne = array(
        'Planet' => array(
           'className' => 'Account',
           'foreignKey' => 'id'
        )
    );

    public function save($data = null, $validate = true, $fieldList = array()) {
        if (isset($this->data[$this->alias]['modified'])) {
            unset($this->data[$this->alias]['modified']);
        }
        return parent::save($this->data, $validate, $fieldList);
    }
}

?>
