<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
?>
<h1><?php echo h($post['Post']['title']); ?></h1>

<span class='post-date'><?php echo $this->Time->format($post['Post']['created'], '%Y-%m-%d'); ?></span>

<p><?php echo h($post['Post']['body']); ?></p>

<?php echo $this->GtwPost->indexBtn('<i class="icon-chevron-left"></i> Back'); ?>