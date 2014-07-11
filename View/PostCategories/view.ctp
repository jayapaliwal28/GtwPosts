<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

$this->assign('postsnav-active', 'posts-'.$category['PostCategory']['slug']);
?>
<h1><span class="pull-right"><?php echo $category['PostCategory']['name']; ?></span></h1>
<div class="clearfix"></div>
<?php foreach ($posts as $post): ?>
    
    <h2>
        <small><?php echo $this->Time->format( 'Y-m-d', $post['Post']['created'] ); ?></small> <br/>
        <a href="/posts/<?php echo $post['Post']['slug']?>"><?php echo $post['Post']['title'] ?></a>
    </h2>
    <hr/>
    
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
