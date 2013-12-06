<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

class Post extends AppModel {
    
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
    
}