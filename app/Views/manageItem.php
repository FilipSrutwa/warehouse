<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center">
    <div class="flex-column mt-5">
        <span class="border border-primary d-flex flex-column justify-content-center p-5 ">
            <h1><b>Nazwa przedmiotu</b>: <?= $foundItem['Name'] ?></h1>
            <h2><b>EAN</b>: <?= $foundItem['EAN'] ?></h2>
            <h2><b>Dostawca</b>: <?= $foundItem['Contractor'] ?></h2>
            <h2><b>Koszt zakupu</b>: <?= $foundItem['PurchasePrice'] ?></h2>
            <h2><b>Sugerowana cena sprzedaży</b>: <?= $foundItem['SellingPrice'] ?></h2>
            <h2><b>Kategoria</b>: <?= $foundItem['Category'] ?></h2>
            <h2><b>Utworzono dnia</b>: <?= $foundItem['CreatedAt'] ?></h2>
            <h2><b>Ostatnia dostawa</b>:
                <?php
                if (isset($foundWarehouseData) && $foundWarehouseData != null) {
                    $date = $foundWarehouseData[count($foundWarehouseData) - 1];
                    echo ($date['Updated_at']);
                } else {
                    echo 'Brak dostawy';
                }
                ?>
            </h2>

            <h2><b>Dostępna ilość</b>:
                <?php
                if (isset($foundWarehouseData) && $foundWarehouseData != null) {
                    $amount = 0;
                    foreach ($foundWarehouseData as $data) {
                        $amount += $data['Amount'];
                    }
                    echo $amount;
                } else {
                    echo 'Brak na magazynie';
                }
                ?></h2>
            </h2>

            <h2><b>Alejka</b>:
                <?php
                if (isset($foundWarehouseData) && $foundWarehouseData != null) {
                    foreach ($foundWarehouseData as $data) {
                        echo '<ul>' . $data['AlleyName'] . '- ' . $data['Amount'] . 'szt. 
                            <a href=/ManageItems/EditAlley/' . $data['ID'] . ' class="btn btn-sm btn-warning">Przenieś do innej alejki</a>
                        </ul>';
                    }
                } else {
                    echo 'Brak na magazynie';
                }
                ?>
            </h2>
        </span>
        <a href="/ManageItems/EditItem/<?= $foundItem['ID'] ?>" class="btn btn-primary btn-lg mt-2" style="width:fit-content !important;">Edytuj przedmiot</a>
        <?php
        if (!isset($foundWarehouseData) || $foundWarehouseData == null)
            echo '
                <button class="btn btn-danger btn-lg mt-2" data-toggle="modal" data-target="#exampleModal" style="width:fit-content !important;">Usuń przedmiot</button>
            ';
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy na pewno usunąć przedmiot?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Spowoduje to usunięcie go na zawsze - to bardzo długo!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                <a href="/ManageItems/DropItem/<?= $foundItem['ID'] ?>" class="btn btn-danger">Tak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>