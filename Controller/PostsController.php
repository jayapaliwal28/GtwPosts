<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 App::uses('CakeTime', 'Utility');
 
 class PostsController extends AppController {
    
    public $components = array('Paginator', 'RequestHandler');
    public $helpers = array('Time', 'Text');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }
    
    public function add() {
        $post_categories = $this->Post->PostCategory->find('list',array(
            'fields'=>array('id','name')
        ));
        $this->set(compact('post_categories'));
            
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
            
            return $this->redirect(array('action' => 'index'));
        }
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->find('first',array(
            'conditions' => array('Post.id' => $id),
        ));
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }

        if (!$this->request->data) {
            $post_categories = $this->Post->PostCategory->find('list',array(
                'fields'=>array('id','name')
            ));
            $this->set(compact('post_categories'));
            $this->request->data = $post;
        }
    }
    
    public function index() {

        if ($this->RequestHandler->isRss() ) {
            $this->layout = 'GtwPosts'; 
            $posts = $this->Post->find(
                'all',
                array('limit' => 20, 'order' => 'Post.created DESC')
            );
            return $this->set(compact('posts'));
        }
        
        $this->paginate = array(
            'limit' => 5,
            'order' => array(
                'Post.created' => 'desc'
            )
        );
        $this->set('posts', $this->paginate());
    }
    
    public function admin_index() {
        $this->set('posts', $this->Post->find('all'));
    }
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
    public function display($slug) {
        $post = $this->Post->findBySlug($slug);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
        $this->render('view');
    }
}