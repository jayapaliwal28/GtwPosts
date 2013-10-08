<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
?>
<h1>Add Post</h1> <hr/>
<?php
echo $this->Form->create('Post', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'wrapInput' => false,
        'class' => 'form-control'
    ),
));
?>

<fieldset>
    <?php
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
    
    <div class="row">
        <div class="col col-md-12">
            <?php echo $this->Form->submit('Save Post', array(
                'div' => false,
                'class' => 'btn btn-primary'
            ));?>
            <?php echo $this->Html->link('Cancel', 
                array('action' => 'index'), 
                array('class' => 'btn btn-default')
            ); ?>
        </div>
    </div>
    
    
</fieldset>

<?php
echo $this->Form->end();
?>