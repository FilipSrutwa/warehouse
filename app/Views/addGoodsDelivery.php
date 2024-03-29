<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="item">Nazwa towaru</label>
                <select class="form-control" id="item" name="item">
                    <?php
                    foreach ($foundItems as $item) {
                        echo '
                        <option value=' . $item['ID'] . '>' . $item['Name'] . '; EAN: ' . $item['EAN'] . '; Dostawca: ' . $item['Contractor'] . '</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="border p-3">
                <p>Brak towaru? Dodaj nowy przy użyciu przycisku poniżej</p>
                <a href="/ManageItems/addItem" class="btn btn-sm btn-success">Dodaj towar</a>
            </div>
            <div class="form-group">
                <label for="amount">Ilość</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>