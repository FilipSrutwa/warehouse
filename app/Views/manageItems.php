<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa przedmiotu</th>
                <th scope="col">Ilość</th>
                <th scope="col">Data ostatniej dostawy</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Przedmiot1</td>
                <td>22</td>
                <td>20.03.2000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Przedmiot2</td>
                <td>22</td>
                <td>20.03.2000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Przedmiot3</td>
                <td>22</td>
                <td>20.03.2000</td>
            </tr>
        </tbody>
    </table>
    <h1>Po kliknięciu na przedmiot wyświetli się strona z jego szczegółami i możliwością korekty stanu- będzie to mocno niezalecane, ponieważ stanem magazynowym zajmie się automat</h1>
</div>
<?= $this->endSection() ?>