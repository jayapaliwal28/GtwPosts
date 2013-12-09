<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */

$this->Helpers->load('GtwRequire.GtwRequire');
$this->GtwRequire->req("ui/datatables");
?> 
<div class="row">
    <div class="col-md-12">
        <h1>Post Categories</h1>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?php echo $this->element('../PostCategories/add'); ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Posts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $category):?>
                        <tr>
                            <td>
                                <?php echo $this->Html->actionLink($category['PostCategory']['name'], 'edit', $category['PostCategory']['id']); ?>
                            </td>
                            <td><?php echo $category['PostCategory']['description']; ?></td>
                            <td><?php echo $category['PostCategory']['slug']; ?></td>
                            <td><?php echo count($category['Post']); ?></td>
                            <td>
                                <span class="pull-right">
                                    <?php echo $this->Html->actionIcon('icon-remove', 'delete', $category['PostCategory']['id']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>