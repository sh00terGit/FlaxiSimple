
<?= $this->theme->header() ?>
<main>
    <div class="container">
        <h3>Posts list <a href="/admin/posts/create">create post</a></h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($posts as $post): ?>
                <tr>     
                    <td><?=$post->id?></td>
                    <td><a href="/admin/posts/edit/<?=$post->id?>" ><?=$post->title?></a></td>
                    <td><?=$post->date?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>


<?= $this->theme->footer() ?>
