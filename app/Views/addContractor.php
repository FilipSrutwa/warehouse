<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="Name">Nazwa firmy</label>
                <input type="text" class="form-control" id="Name" name="name">
            </div>
            <div class="form-group">
                <label for="AccNumber">Nr konta bankowego</label>
                <input type="text" class="form-control" id="AccNumber" name="accNumber" pattern="^\d{26}$">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" pattern="^\d{11}$">
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>