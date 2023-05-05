<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid d-flex justify-content-center align-items-center mt-5 flex-wrap">
    <div class="card mr-2" style="width: 19rem; height:32rem;">
        <img class="card-img-top" src="/assets/pics/Items.png" alt="Card image cap">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title text-center">Obsługa stanu magazynowego</h5>
            <p class="card-text text-center">Zarządzanie przedmiotami na magazynie, przeglądanie stanu magazynowego oraz korekta stanu.</p>
            <a href="/ManageItems" class="btn btn-primary mt-auto">Przejdź do strony</a>
        </div>
    </div>
    <div class="card mr-2" style="width: 19rem; height:32rem;">
        <img class="card-img-top" src="/assets/pics/AccManagment.png" alt="Card image cap">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title text-center">Zarządzanie kontami</h5>
            <p class="card-text text-center">Przeglądanie istniejących kont, zarządzanie już istniejącymi</p>
            <a href="/ManageAccounts" class="btn btn-primary mt-auto">Przejdź do strony</a>
        </div>
    </div>
    <div class="card mr-2" style="width: 19rem; height:32rem;">
        <img class="card-img-top" src="/assets/pics/Delivery.png" alt="Card image cap">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title text-center">Zarządzanie przyjęciami/wydaniami</h5>
            <p class="card-text text-center">Przeglądanie przyjęć/wydań oraz ich szczegółów</p>
            <a href="/Deliveries" class="btn btn-primary mt-auto">Przejdź do strony</a>
        </div>
    </div>
    <div class="card mr-2" style="width: 19rem; height:32rem;">
        <img class="card-img-top" src="/assets/pics/Contrahents.png" alt="Card image cap">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title text-center">Zarządzanie dostawcami/kontrahentami</h5>
            <p class="card-text text-center">Zarządzanie dostawcami oraz kontrahentami oraz przeglądanie ich szczegółów</p>
            <a href="/ManageContractors" class="btn btn-primary mt-auto">Przejdź do strony</a>
        </div>
    </div>
    <div class="card mr-2" style="width: 19rem; height:32rem;">
        <img class="card-img-top" src="/assets/pics/History.png" alt="Card image cap">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title text-center">Zarządzaj sprzedażą</h5>
            <p class="card-text text-center">Przeglądanie historii oraz szczegółów dot. sprzedaży</p>
            <a href="/SalesHistory" class="btn btn-primary mt-auto">Przejdź do strony</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>