<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center">
    <div class="flex-column mt-5">
        <span class="border border-primary d-flex flex-column justify-content-center p-5 align-items-center">
            <img src="/assets/pics/acc.png" class="img-fluid profile-image-pic img-thumbnail mt-1 mb-3" width="200px" alt="profile">
            <h1>Imię i nazwisko: <?= $foundAccount['Name'] . ' ' . $foundAccount['Surname'] ?></h1>
            <h2>Login: <?= $foundAccount['Login'] ?></h2>
            <h2>Poziom uprawnień: <?= $foundAccType['Name'] ?></h2>
        </span>
        <a href="/ManageAccounts/EditAccount/<?= $foundAccount['ID'] ?>" class="btn btn-primary btn-lg mt-2" style="width:fit-content !important;">Edytuj profil</a>
        <button class="btn btn-danger btn-lg mt-2" data-toggle="modal" data-target="#exampleModal" style="width:fit-content !important;">Usuń profil</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy na pewno usunąć użytkownika?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Spowoduje to usunięcie go na zawsze - to bardzo długo!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                <a href="/ManageAccounts/DropAccount/<?= $foundAccount['ID'] ?>" class="btn btn-danger">Tak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>