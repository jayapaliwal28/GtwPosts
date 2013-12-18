<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
 $this->Helpers->load('GtwRequire.GtwRequire');
 echo $this->GtwRequire->req('posts/wysiwyg');
?>

<div class="row">
    <div class="col-md-12">
        <h1>Edit Post</h1>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <?php
            echo $this->Form->create('Post', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
            ));
            echo $this->Form->input('title', array(
                'label' => 'Title',
                'placeholder' => 'Post title'
            ));
            echo $this->Form->input('body', array(
                'label' => 'Body',
                'rows' => '3',
                'placeholder' => 'Post body'
            ));
        ?>
    </div>
    <div class="col-md-3">
        <?php echo $this->Form->input('PostCategory', array(
            'options' => $post_categories,
        )); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->submit('Save Post', array(
            'div' => false,
            'class' => 'btn btn-primary'
        ));?>
        <?php echo $this->Html->actionBtn('Cancel', 'index'); ?>
    </div>
</div>
<?php
    echo $this->Form->end();
?>
