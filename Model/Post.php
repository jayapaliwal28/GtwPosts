<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

class Post extends AppModel {

    public $belongsTo = array('User');

    public $hasAndBelongsToMany = array(
        'PostCategory' =>
            array(
                'className' => 'PostCategory',
                'joinTable' => 'posts_post_categories',
                'foreignKey' => 'post_id',
                'associationForeignKey' => 'post_category_id',
                'unique' => true,
            )
    );
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if(!$this->data['Post']['slug']){
            $this->data['Post']['slug'] = $this->data['Post']['title'];
        }
        $this->data['Post']['slug'] = Inflector::slug(strtolower($this->data['Post']['slug']));
        return true;
    }
    
}
