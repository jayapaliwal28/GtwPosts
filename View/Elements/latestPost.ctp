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
    <small><?php echo $this->Time->format($post['Post']['created'], '%Y-%m-%d'); ?></small> <br/>
    <?php echo $post['Post']['title']; ?>
</h2>

<p><?php echo $post['Post']['body']; ?></p>

<?php endforeach; ?>