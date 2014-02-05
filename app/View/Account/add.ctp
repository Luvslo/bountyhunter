<div class="users form">
<?php echo $this->Form->create('Account'); ?>
    <fieldset>
        <legend><?php echo __('Registreren'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('repeat_password', array('type' => 'password'));
        /*
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));*/
    ?>
    <?php echo $this->Form->end(__('Registreren')); ?>
    </fieldset>
</div>