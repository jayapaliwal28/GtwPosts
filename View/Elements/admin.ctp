<li>
    <?php echo $this->Html->link( 'posts', array(
        'plugin' => 'gtw_posts',
        'controller' => 'posts', 
        'action' => 'admin_index'
    )) ?>
</li>
<li>
    <?php echo $this->Html->link( 'post categories', array(
        'plugin' => 'gtw_posts',
        'controller' => 'post_categories', 
        'action' => 'admin_index'
    )); ?>
</li>