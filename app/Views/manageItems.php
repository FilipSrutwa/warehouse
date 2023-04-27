<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showItem(itemID) {
        const path = `/ManageItems/ManageItem/${itemID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <a href="/ManageItems/addItem" class="btn btn-lg btn-primary mt-3">Dodaj nowy przedmiot</a>
    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa przedmiotu</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Data utworzenia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundItems as $item) {
                echo '
                    <tr onclick="showItem(' . $item['ID'] . ')">
                        <th scope="row">' . $i . '</th>
                        <td>' . $item['Name'] . '</td>
                        <td>' . $item['Category'] . '</td>
                        <td>' . $item['Created_at'] . '</td>
                    </tr>
                    ';
                $i++;
            }
            ?>

        </tbody>
    </table>
</div>
<?= $this->endSection() ?>