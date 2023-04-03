<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa sprzedanego przedmiotu</th>
                <th scope="col">Data sprzedaży</th>
                <th scope="col">Cena sprzedaży</th>
                <th scope="col">Komu(puste jeśli nie na firmę)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>przemiot1</td>
                <td>31.05.2001</td>
                <td>21.37 zł</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>przemiot2</td>
                <td>20.01.1997</td>
                <td>21.37 zł</td>
                <td>Spółka zło Dundersztyca</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>przemiot3</td>
                <td>15.03.2015</td>
                <td>21.37 zł</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <a href="/SalesHistory/AddSale" class="btn btn-lg btn-primary">Dodaj sprzedaż</a>
</div>
<?= $this->endSection() ?>