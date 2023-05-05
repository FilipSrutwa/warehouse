<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="mt-5">
        <a href="/Deliveries/AddGoodsIssue" class="btn btn-lg btn-primary mr-3">Dodaj wydanie</a>
        <a href="/Deliveries/AddGoodsDelivery" class="btn btn-lg btn-primary">Dodaj przyjęcie</a>
    </div>

    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa towaru</th>
                <th scope="col">Ilość</th>
                <th scope="col">Typ akcji</th>
                <th scope="col">Data akcji</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundDeliveries as $delivery) {
                echo '
                <tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $delivery['Name'] . '</td>
                    <td>' . $delivery['Amount'] . '</td>
                    <td>Przyjęto</td>
                    <td>' . $delivery['Created_at'] . '</td>
                    <td>
                        <a href="/Deliveries/editDelivery/' . $delivery['ID'] . '" class="btn btn-sm btn-warning">Edytuj</a>
                        <a href="/Deliveries/dropDelivery/' . $delivery['ID'] . '" class="btn btn-sm btn-danger">Usuń</a>
                    </td>
                </tr>
                ';
                $i++;
            }
            ?>

        </tbody>
    </table>
</div>
<?= $this->endSection() ?>