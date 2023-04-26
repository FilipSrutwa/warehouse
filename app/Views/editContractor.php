<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="Name">Nazwa firmy</label>
                <input type="text" class="form-control" id="Name" name="name" value="<?= $foundContractor['Name'] ?>">
            </div>
            <div class="form-group">
                <label for="AccNumber">Nr konta bankowego</label>
                <input type="text" class="form-control" id="AccNumber" name="accNumber" value="<?= $foundContractor['Bank_account'] ?>" pattern="^\d{26}$">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $foundContractor['NIP'] ?>" pattern="^\d{10}$">
            </div>

            <button type="submit" class="btn btn-success btn-lg">Zmień</button>
            <a href="/ManageContractors/Contractor/<?= $foundContractor['ID'] ?>" class="btn btn-lg btn-warning">Opuść bez zmian</a>
        </form>
    </div>

</div>
<?= $this->endSection() ?>