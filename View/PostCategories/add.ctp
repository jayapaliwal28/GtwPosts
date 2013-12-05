<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->create('PostCategory', array('action' => 'add'));?>
    
            <div class="form-group">
                <label for="post-cat-name">Name</label>
                <input id="post-cat-name" name="data[PostCategory][name]" type="name" class="form-control" placeholder="Category Name" required>
            </div>
            <div class="form-group">
                <label for="post-cat-desc">Description</label>
                <input id="post-cat-desc" name="data[PostCategory][description]" type="name" class="form-control" placeholder="Category Description">
            </div>
            <div class="form-group">
                <label for="post-cat-slug">Slug</label>
                <input id="post-cat-slug" name="data[PostCategory][slug]" type="name" class="form-control" placeholder="slug">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
            
        </form>
            
    </div>
</div>