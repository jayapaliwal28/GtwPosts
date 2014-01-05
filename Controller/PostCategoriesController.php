<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
 class PostCategoriesController extends AppController {
    
    public $components = array('Paginator', 'RequestHandler');
    
     public $paginate = array(
        'order' => array(
            'Post.created' => 'desc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'feed', 'display', 'getLatest');
        if ($this->Auth->user('role') == 'admin'){
            $this->Auth->allow();
        }
    }
    
    public function add() {
        $titleForLayout = 'Add post';
        $this->set(compact('titleForLayout'));
        
        if ($this->request->is('post')) {
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
            $titleForLayout = 'Edit : ' . $this->request->data['PostCategory']['name'];
            $this->set(compact('titleForLayout'));
        }
    }
    
    public function index() {
        $categories = $this->PostCategory->find(
            'all', array(
                'order'=>array('PostCategory.name ASC'),
        ));
        $titleForLayout = 'Categories index';
        $this->set(compact('categories', 'titleForLayout'));
    }
    
    public function view($slug) {
        $category = $this->PostCategory->findBySlug($slug);
        $titleForLayout = $category['PostCategory']['name'].' - '.$category['PostCategory']['description'];
        $this->Paginator->settings = array('Post' => array(
            'joins' => array(
                array(
                    'table' => 'posts_post_categories', 
                    'alias' => 'PostsPostCategory', 
                    'type' => 'inner',  
                    'conditions'=> array('PostsPostCategory.post_id = Post.id') 
                ), 
                array( 
                    'table' => 'post_categories',
                    'alias' => 'PostCategory', 
                    'type' => 'inner',  
                    'conditions'=> array( 
                        'PostCategory.id = PostsPostCategory.post_category_id', 
                        'PostCategory.slug' => $slug
                    )
                )
            ),
            'order' => 'Post.created DESC'
        ));
        
        $posts = $this->Paginator->paginate('Post');
        $this->set(compact('posts', 'category', 'titleForLayout'));
    }
    
    public function feed($slug) {
        if ($this->RequestHandler->isRss() ) {
            $this->layout = 'GtwPosts';
            $posts = $this->PostCategory->findBySlug($slug);
            return $this->set(compact('posts'));
        }
    }
    
        
    public function getLatest($limit, $category) {
        $this->layout = false;
        $this->autoRender = false;
        
        $posts = $this->PostCategory->find('all',array(
            'conditions' => array('PostCategory.slug' => $category),
            'contain' => array(
                'Post' => array(
                    'limit' => $limit
                )
            )
        ));
        
        return $posts[0]['Post'];
    }
 
 }