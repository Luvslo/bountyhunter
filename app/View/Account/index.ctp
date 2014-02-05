<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Account'); ?>
    <fieldset>
        <legend><?php echo __('Login - Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    <a style="margin: -30px 0 0 7px; font-size: 12px;" href="<?php echo $this->Form->url('/register'); ?>">Registreren</a>
    <?php echo $this->Form->end(__('Login')); ?>
    </fieldset>
</div>