<?= $this->theme->header(); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
           <?php if(isset($page)) { ?>
                <h3><?=$page->title?></h3>
           <?php } else { ?>
                 <h3>Create Page</h3>
           <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <form>
                    <input type="hidden" name="id" id="formId" value="<?=$page->id?>"/>
                    <div class="form-group">
                        <label for="formTitle">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$page->title?>" id="formTitle" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="formContent">Text</label>
                        <textarea name="content" class="form-control"id="formContent" placeholder="Enter text"><?=$page->content?></textarea>
                    </div>

                </form>
            </div>
            <div class="col-3">
                <div>
                    <p>&nbsp;</p>
                    <button type="submit" class="btn btn-primary" onclick="page.save()">Save page</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->theme->footer(); ?>
