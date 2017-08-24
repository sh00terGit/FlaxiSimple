<?= $this->theme->header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
           <?php if(isset($post)) { ?>
                <h3><?=$post->title?></h3>
           <?php } else { ?>
                 <h3>Create Post</h3>
           <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <form>
                    <input type="hidden" name="id" id="formId" value="<?=$post->id?>"/>
                    <div class="form-group">
                        <label for="formTitle">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$post->title?>" id="formTitle" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="formContent">Text</label>
                        <textarea name="content" class="form-control"id="formContent" placeholder="Enter text"><?=$post->content?></textarea>
                    </div>

                </form>
            </div>
            <div class="col-3">
                <div>
                    <p>&nbsp;</p>
                    <button type="submit" class="btn btn-primary" onclick="post.save()">Save page</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->theme->footer(); ?>
