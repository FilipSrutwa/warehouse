<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="mt-5">
        <a href="/WarehouseHistory/AddGoodsIssue" class="btn btn-lg btn-primary mr-3">Dodaj wydanie</a>
        <a href="/WarehouseHistory/AddGoodsDelivery" class="btn btn-lg btn-primary">Dodaj przyjęcie</a>
    </div>

    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa towaru</th>
                <th scope="col">Typ akcji</th>
                <th scope="col">Data akcji</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>przedmiot1</td>
                <td>Przyjęto</td>
                <td>31.05.2001</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>przemdiot2</td>
                <td>Wydano</td>
                <td>20.01.1997</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>przedmiot3</td>
                <td>Przyjęto</td>
                <td>15.03.2015</td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>