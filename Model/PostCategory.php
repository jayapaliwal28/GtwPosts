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
            )
    );
    
}