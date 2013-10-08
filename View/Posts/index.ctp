<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

 $this->Helpers->load('GtwRequire.GtwRequire');
 $this->GtwRequire->req("ui/app/datatables");
?>

<h1><?php echo Configure::read('GtwPosts.MainTitle'); ?></h1>

    <?php foreach ($posts as $post): ?>
    <hr/>
    <h2>
        <?php echo $this->GtwPost->viewLnk($post['Post']['id'], $post['Post']['title']); ?> <br/>
    </h2>
    <span class='post-date'><?php echo $post['Post']['created']; ?></span>
    <p><?php echo $post['Post']['body']; ?></p>
    
    <p>
        <?php echo $this->GtwPost->readMore($post['Post']['id']); ?>
    </p>
    
    
    <?php endforeach; ?>

