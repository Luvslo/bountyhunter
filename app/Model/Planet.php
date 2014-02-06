<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planet
 *
 * @author obentvelzen
 */
class Planet extends AppModel{
    public $belongsTo = array(
        'Character' => array(
           'className' => 'Account',
           'foreignKey' => 'planet_id'
       )
    );
}

?>
