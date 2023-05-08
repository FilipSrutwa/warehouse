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

<script>
    function showOrder(orderID, buyer, collectionDate) {
        const path = "/Orders/Order/" + orderID;
        window.location.assign(path);
    }
</script>

<div class="container-fluid mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Zamawiający</th>
                <th scope="col">Dodano przez</th>
                <th scope="col">Data odbioru zamówienia</th>
                <th scope="col">Utworzono dnia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundOrders as $order) {
                $parameterString = $order['ID'] . ',\'' . $order['Buyer'] . '\',\'' . $order['Collection_date'] . '\'';
                echo '
                <tr onclick="showOrder(' . $parameterString . ')">
                    <th scope="row">' . $i . '</th>
                    <td>' . $order['Buyer'] . '</td>
                    <td>' . $order['Name'] . ' ' . $order['Surname'] . '</td>
                    <td>' . $order['Collection_date'] . '</td>
                    <td>' . $order['Created_at'] . '</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>
    <a href="/Orders/AddOrder" class="btn btn-lg btn-primary">Dodaj nowe zamówienie</a>
</div>
<?= $this->endSection() ?>