<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

App::uses('HtmlHelper', 'View/Helper');

class GtwPostHelper extends Helper {
    
    public $helpers = array('Session', 'Html');
    
    public function editLnk($postId){
        return $this->Html->link(
            '<i class="icon-edit"> </i>',
            array(
                'plugin' => 'gtw_posts', 
                'controller' => 'posts', 
                'action' => 'edit',
                $postId
            ),
            array('escape' => FALSE)
        );
    }

    public function deleteLnk($postId){
        return $this->Html->link(
            '<i class="icon-remove"> </i>',
            array(
                'plugin' => 'gtw_posts', 
                'controller' => 'posts', 
                'action' => 'delete',
                $postId
            ),
            array('escape' => FALSE)
        );
    }
    
    public function viewLnk($postId, $text){
        return $this->Html->link(
            $text,
            array(
                'plugin' => 'gtw_posts', 
                'controller' => 'posts', 
                'action' => 'view',
                $postId
            ),
            array('escape' => FALSE)
        );
    }
    
    public function readMore($postId){
        return $this->Html->link(
            'Read More <i class="icon-chevron-right"></i>',
            array(
                'plugin' => 'gtw_posts', 
                'controller' => 'posts', 
                'action' => 'view',
                $postId
            ),
            array(
                'escape' => FALSE,
                'class' => 'btn btn-default'
            )
        );
    }
    
    public function indexBtn($text){
        return $this->Html->link(
            $text,
            array(
                'plugin' => 'gtw_posts', 
                'controller' => 'posts', 
                'action' => 'index'
            ),
            array(
                'escape' => FALSE,
                'class' => 'btn btn-default'
            )
        );
    }
}