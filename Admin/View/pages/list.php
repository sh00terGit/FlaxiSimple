
<?= $this->theme->header() ?>
<main>
    <div class="container">
        <h3>Pages list <a href="/admin/pages/create">create page</a></h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($pages as $page): ?>
                <tr>     
                    <td><?=$page->id?></td>
                    <td><a href="/admin/pages/edit/<?=$page->id?>" ><?=$page->title?></a></td>
                    <td><?=$page->date?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>


<?= $this->theme->footer() ?>
