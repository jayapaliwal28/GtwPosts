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

<p><?php echo $this->Html->actionBtn('Add Post', 'add', null, 'btn-primary'); ?></p>

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
                    echo $this->Html->actionLink($post['Post']['title'], 'view', $post['Post']['id']); 
                ?>
            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
            <td>
            <?php
                echo $this->Html->actionIcon('icon-edit', 'edit', $post['Post']['id']);
                echo $this->Html->actionIcon('icon-remove', 'delete', $post['Post']['id']);
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>