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
}

?>
