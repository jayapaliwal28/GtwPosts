<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
 
$posts = $this->requestAction(array(
        'plugin' => 'gtw_posts',
        'controller' => 'posts', 
        'action' => 'get'
));
?>

<?php foreach ($posts as $post): ?>
    <h2>
        <small><?php echo $post['Post']['created']; ?></small> <br/>
        <?php echo $this->Html->actionLink($post['Post']['title'], 'view', $post['Post']['id']); ?>
    </h2>
    <p><?php echo $post['Post']['body']; ?></p>
    <hr/>
<?php endforeach; ?>

<?php echo $this->Paginator->pagination(array(
    'ul' => 'pagination'
)); ?>