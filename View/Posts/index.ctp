<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

 $this->Helpers->load('GtwRequire.GtwRequire');
 $this->GtwRequire->req("ui/app/datatables");
 $this->assign('active_nav', 'news-lnk');
?>

<h1><?php echo Configure::read('GtwPosts.MainTitle'); ?></h1>

    <?php foreach ($posts as $post): ?>
    <hr/>
    <h2>
        <?php echo $this->Html->actionLink($post['Post']['title'], 'view', $post['Post']['id']); ?> <br/>
    </h2>
    <span class='post-date'><?php echo $post['Post']['created']; ?></span>
    <p><?php echo $post['Post']['body']; ?></p>
    
    <p>
        <?php echo $this->Html->actionBtnIcon('Read More', 'icon-chevron-right', 'view', $post['Post']['id']); ?>
    </p>
    
    
    <?php endforeach; ?>

