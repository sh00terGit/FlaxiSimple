<?= $this->theme->header() ?>

<main>
    <div class="container">
        <h3>Pages list</h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Марк</td>
                    <td>Отто</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Джейкоб</td>
                    <td>Тортон</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td >Ларри the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?= $this->theme->footer() ?>
