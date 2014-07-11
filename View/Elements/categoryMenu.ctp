<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
    $categories = $this->requestAction(array(
        'plugin'=>'gtw_posts', 
        'controller' => 'PostCategories', 
        'action' => 'listall'
    ));
?>
<h3>Categories</h3>
<ul class="nav nav-pills nav-stacked">
    <li id="posts-all"><a href="/posts">All Posts</a></li>
    <?php foreach ($categories as $category): ?>
        <li id="posts-<?php echo $category['PostCategory']['slug']; ?>">
            <a href="/categories/<?php echo $category['PostCategory']['slug']; ?>">
                <?php echo $category['PostCategory']['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<input class='active-lnk' type="hidden" value='<?php echo $this->fetch('postsnav-active'); ?>'/>
    
<?php 
    echo $this->GtwRequire->req('ui/activenav');
?>
