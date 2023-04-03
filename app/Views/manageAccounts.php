<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>pracownik1</td>
                <td>Otto</td>
                <td>Kowalski</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>pracownik2</td>
                <td>Thornton</td>
                <td>Smith</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>pracownik3</td>
                <td>Adam</td>
                <td>Wiśniewski</td>
            </tr>
        </tbody>
    </table>
    <a href="/ManageAccounts/addEmployee" class="btn btn-lg btn-primary">Dodaj pracownika</a>
</div>
<?= $this->endSection() ?>