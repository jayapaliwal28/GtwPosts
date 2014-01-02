<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

 $this->Helpers->load('GtwRequire.GtwRequire');
 $this->GtwRequire->req("ui/datatables");
?>

<h1>Posts</h1>

<p><?php echo $this->Html->actionBtn('Add Post', 'add', null, 'btn-primary'); ?></p>

<table class='table table-hoover table-striped datatable'>
    
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Created</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php 
                    echo $this->Html->actionLink($post['Post']['title'], 'edit', $post['Post']['id']); 
                ?>
            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
            <td>
            <span class="pull-right"><?php
                    echo $this->Html->actionIcon('fa fa-times', 'delete', $post['Post']['id']);
                ?></span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>