<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="Name">Nazwa przedmiotu</label>
                <input type="text" class="form-control" id="Name" name="name">
            </div>
            <div class="form-group">
                <label for="EAN">EAN</label>
                <input type="text" class="form-control" id="EAN" name="ean" pattern="\d{12}">
            </div>
            <div class="form-group">
                <label for="Contractor">Dostawca</label>
                <select class="form-control" id="Contractor" name="contractor">
                    <?php
                    foreach ($foundContractors as $contractor) {
                        echo '<option value=' . $contractor['ID'] . '>' . $contractor['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="PurchasePrice">Koszt zakupu</label>
                <input type="text" class="form-control" id="PurchasePrice" name="purchasePrice">
            </div>
            <div class="form-group">
                <label for="SellingPrice">Cena sprzedaży</label>
                <input type="text" class="form-control" id="SellingPrice" name="sellingPrice">
            </div>
            <div class="form-group">
                <label for="Category">Kategoria</label>
                <select class="form-control" id="Category" name="category">
                    <?php
                    foreach ($foundCategories as $category) {
                        echo '<option value=' . $category['ID'] . '>' . $category['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>