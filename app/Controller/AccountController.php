<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author obentvelzen
 */
class AccountController extends AppController{
    //block all else for the user
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'add'));
    }

    public function index(){
        if ($this->request->is('post')) {
            if ($this->Auth->login($this->data)){
                //put the Account in the session
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function dashboard(){
        $account = $this->Account->find('first', array(
            'conditions' => array(
                'Account.id' => $this->Session->read('Account.id')
            ),
            'contain' => array(
                'Character'
            )
        ));

        print_r($this->Session->read());
    }

    public function view($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('Account', $this->Account->read(null, $id));
    }

    public function add(){
        if ($this->request->is('post')) {
            $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('New Account created'));
                return $this->redirect('/login');
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        if(!is_null($id)){
            $this->Account->id = $id;
            if (!$this->Account->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->Account->read(null, $id);
            unset($this->request->data['Account']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Account->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function logout() {
        $this->Session->write('view', NULL);
        return $this->redirect($this->Auth->logout());
    }

}

?>
