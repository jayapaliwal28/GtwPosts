<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->create('PostCategory', array('action' => 'edit'));?>
    
            <div class="form-group">
                <label for="post-cat-name">Name</label>
                <input id="post-cat-name" name="data[PostCategory][name]" type="name" class="form-control" value="<?php echo $this->request->data['PostCategory']['name'] ;?>" required>
            </div>
            <div class="form-group">
                <label for="post-cat-desc">Description</label>
                <input id="post-cat-desc" name="data[PostCategory][description]" type="name" class="form-control" value="<?php echo $this->request->data['PostCategory']['description'] ;?>">
            </div>
            <div class="form-group">
                <label for="post-cat-slug">Slug</label>
                <input id="post-cat-slug" name="data[PostCategory][slug]" type="name" class="form-control" value="<?php echo $this->request->data['PostCategory']['slug'] ;?>">
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
            
        </form>
            
    </div>
</div>