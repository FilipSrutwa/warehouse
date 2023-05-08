<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.noConflict();
        $('#myTable').DataTable();
    });
</script>

<div class="container-fluid mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Przedmiot</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena sprzedaży</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundOrderData as $data) {
                echo '
                <tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $data['Item_name'] . '</td>
                    <td>' . $data['Amount'] . '</td>
                    <td>' . $data['Price'] . '</td>
                    <td>
                        <a href="/Orders/ChangeItemAmountInOrder/' . $orderID . '?warehouseItemID=' . $data['Warehouse_item_ID'] . '" class="btn btn-sm btn-warning">Zmień ilość</a>
                        <a href="/Orders/DropItemFromOrder/' . $orderID . '?warehouseItemID=' . $data['Warehouse_item_ID'] . '" class="btn btn-sm btn-danger">Usuń przedmiot z zamówienia</a>
                    </td>
                </tr>
                ';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <div class="mt-2">
        <a href="/Orders/FinishOrder/<?= $orderID ?>" class="btn btn-lg btn-success">Odebrano zamówienie</a>
        <a href="/Orders/AddToOrder/<?= $orderID ?>" class="btn btn-lg btn-primary">Dodaj nowy przedmiot do zamówienia</a>
        <a href="/Orders/DropOrder/<?= $orderID ?>" class="btn btn-lg btn-danger">Skasuj zamówienie</a>
    </div>
    <div class="mt-3">
        <h1>Podsumowanie</h1>
        <h2 id="price">Cena: <?= $totalPrice ?></h2>
        <h2>Data odbioru: <?= $collectionDate ?></h2>
        <h2>Osoba odbierająca: <?= $buyer['Name'] ?></h2>
    </div>
</div>
<?= $this->endSection() ?>