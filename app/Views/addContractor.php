<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form action="POST">
            <div class="form-group">
                <label for="Name">Nazwa firmy</label>
                <input type="text" class="form-control" id="Name">
            </div>
            <div class="form-group">
                <label for="AccNumber">Nr konta bankowego</label>
                <input type="text" class="form-control" id="AccNumber">
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>