<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
 class PostCategoriesController extends AppController {
 
    public function add() {
        $this->PostCategory->create();
        if ($this->PostCategory->save($this->request->data)) {
            $this->Session->setFlash('The post category has been created successfully', 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
            $this->redirect(array(
                'plugin' => 'gtw_posts',
                'controller' => 'post_categories',
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash('Post category could not be created.', 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }
    }
    
    public function delete($id = null) {
        $this->PostCategory->id = $id;
        if (!$this->PostCategory->exists()) {
            throw new NotFoundException(__('Invalid post category'));
        }
        if ($this->PostCategory->delete()) {
            $this->Session->setFlash('Post category deleted successfully.', 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Post category could not be deleted.', 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-danger'
        ));
        return $this->redirect(array('action' => 'index'));
    }
    
    public function edit( $id ) {
        $this->PostCategory->id = $id;

        if ($this->request->is('post')) {
            if ($this->PostCategory->save($this->request->data)) {
                $this->Session->setFlash(__('Post category has been updated'), 'flash');
                $this->Session->setFlash('Post category has been updated', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Post category could not be updated', 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        } else {
            $this->request->data = $this->PostCategory->read();
        }
    }
    
    public function index() {
        $categories = $this->PostCategory->find(
            'all', array(
                'order'=>array('PostCategory.name ASC'),
        ));
        $this->set('categories', $categories);
    }
 
 
 }