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
                <th scope="col">Nazwa sprzedanego przedmiotu</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena sprzedaży</th>
                <th scope="col">Komu(puste jeśli nie na firmę)</th>
                <th scope="col">Imię i nazwisko pracownika</th>
                <th scope="col">Identyfikator koszyka</th>
                <th scope="col">Data sprzedaży</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundSales as $sale) {
                echo '
                <tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $sale['Name'] . '</td>
                    <td>' . $sale['Amount'] . '</td>
                    <td>' . $sale['Sell_price'] . '</td>
                    <td>' . $sale['Buyer'] . '</td>
                    <td>' . $sale['EmployeeName'] . ' ' . $sale['EmployeeSurname'] . '</td>
                    <td>' . $sale['Bag_ID'] . '</td>
                    <td>' . $sale['Created_at'] . '</td>
                </tr>
                ';
                $i++;
            }
            ?>

        </tbody>
    </table>
    <a href="/Sales/AddSale" class="btn btn-lg btn-primary">Dodaj sprzedaż</a>
</div>
<?= $this->endSection() ?>