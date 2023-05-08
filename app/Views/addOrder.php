<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="buyer">Nazwa towaru</label>
                <select class="form-control" id="buyer" name="buyer">
                    <?php
                    foreach ($foundBuyers as $buyer) {
                        echo '
                        <option value=' . $buyer['ID'] . '>' . $buyer['Name'] . '</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="collectionDate">Data odbioru</label>
                <input type="date" class="form-control" id="collectionDate" name="collectionDate" value="<?php echo date('Y-m-d') ?>">
            </div>
            <button type=" submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>