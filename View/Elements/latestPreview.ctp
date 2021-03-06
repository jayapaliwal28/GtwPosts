<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
    $posts = $this->requestAction(array(
        'plugin'=>'gtw_posts', 
        'controller' => 'Posts', 
        'action' => 'getLatest', $limit
    ));
?>
<?php foreach ($posts as $post): ?>
    
    <h2>
        <small><?php echo $this->Time->format( 'Y-m-d', $post['Post']['created'] ); ?></small> <br/>
        <?php echo $post['Post']['title']; ?>
    </h2>
    
    <p>
        <?php echo $this->Text->truncate( $post['Post']['body'], 700, array(
            'ellipsis' => '...',
            'exact' => false,
            'html' => true
        )); ?>
    </p>
    <p>
        <a class="btn btn-default" href="/posts/<?php echo $post['Post']['slug']?>">Read more...</a>
    </p>
    
<?php endforeach; ?>