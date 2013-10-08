<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

 $this->Helpers->load('GtwRequire.GtwRequire');
 $this->GtwRequire->req("ui/app/datatables");
?>

<h1>Blog posts</h1>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>

<table class='table table-hoover table-striped datatable'>
    
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php 
                    echo $this->GtwPost->viewLnk($post['Post']['id'], $post['Post']['title']); 
                ?>
            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
            <td>
            <?php
                echo $this->GtwPost->editLnk($post['Post']['id']);
                echo $this->GtwPost->deleteLnk($post['Post']['id']);
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>