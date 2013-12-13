<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
?>
<h1><?php echo $category['PostCategory']['name']?></h1>
<hr/>
<?php foreach ($posts as $post): ?>
    
    <h2>
        <small><?php echo $this->Time->format( 'Y-m-d', $post['Post']['created'] ); ?></small> <br/>
        <?php echo $post['Post']['title']; ?>
    </h2>
    
    <p><?php echo $this->Html->textify($post['Post']['body'], 700); ?></p>
    <p><?php echo $this->Html->actionBtn('Read more...', 'view', $post['Post']['id']); ?></p>
    <hr/>
    
<?php endforeach; ?>