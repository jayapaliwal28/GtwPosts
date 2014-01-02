<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

class PostCategory extends AppModel {
    
    public $hasAndBelongsToMany = array(
        'Post' =>
            array(
                'className' => 'Post',
                'joinTable' => 'posts_post_categories',
                'foreignKey' => 'post_category_id',
                'associationForeignKey' => 'post_id',
                'unique' => true,
                'order' => 'Post.created DESC'
            )
    );
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if(!$this->data['PostCategory']['slug']){
            $this->data['PostCategory']['slug'] = $this->data['PostCategory']['title'];
        }
        $this->data['PostCategory']['slug'] = Inflector::slug(strtolower($this->data['PostCategory']['slug']));
        return true;
    }
    
}