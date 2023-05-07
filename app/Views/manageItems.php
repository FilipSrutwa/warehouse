<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showItem(itemID) {
        const path = `/ManageItems/ManageItem/${itemID}`;
        window.location.assign(path);
    }
</script>
<script src="/scripts/tableSearch.js"></script>
<div class="container-fluid">
    <a href="/ManageItems/addItem" class="btn btn-lg btn-primary mt-3">Dodaj nowy przedmiot</a>

    <div class="input-group mt-5">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">&#128269;</span>
        </div>
        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="search" onkeyup="searchTable()" placeholder="Wyszukaj nazwę przedmiotu">
    </div>

    <table class="table table-hover mt-1" id="table">
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