<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa firmy</th>
                    <th scope="col">Data początku współpracy</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>firma1</td>
                    <td>31.05.2001</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>firma2</td>
                    <td>20.01.1997</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>firma3</td>
                    <td>15.03.2015</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="/ManageContractors/addContractor" class="btn btn-lg btn-primary">Dodaj dostawcę</a>
</div>
<?= $this->endSection() ?>