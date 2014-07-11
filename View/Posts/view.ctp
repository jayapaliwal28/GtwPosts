<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
?>
<h2>
    <small><?php echo $this->Time->format($post['Post']['created'], '%Y-%m-%d'); ?> By <?php echo $post['User']['first']." ".$post['User']['last']; ?></small> <br/>
    <?php echo $post['Post']['title']; ?>
</h2>

<p><?php echo $post['Post']['body']; ?></p>

<?php echo $this->Html->actionIconBtn('icon-chevron-left', 'Back', 'index'); ?>
