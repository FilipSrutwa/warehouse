<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="Name">Nazwa przedmiotu</label>
                <input type="text" class="form-control" id="Name" name="name" value="<?= $foundItem['Name'] ?>">
            </div>
            <div class="form-group">
                <label for="EAN">EAN</label>
                <input type="text" class="form-control" id="EAN" name="ean" pattern="\d{12}" value="<?= $foundItem['EAN'] ?>">
            </div>
            <div class="form-group">
                <label for="Contractor">Dostawca</label>
                <select class="form-control" id="Contractor" name="contractor">
                    <?php
                    foreach ($foundContractors as $contractor) {
                        if ($contractor['ID'] == $foundItem['Contractor'])
                            echo '<option value=' . $contractor['ID'] . ' selected>' . $contractor['Name'] . '</option>';
                        else
                            echo '<option value=' . $contractor['ID'] . '>' . $contractor['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="PurchasePrice">Koszt zakupu</label>
                <input type="text" class="form-control" id="PurchasePrice" name="purchasePrice" value="<?= $foundItem['Purchase_price'] ?>">
            </div>
            <div class="form-group">
                <label for="SellingPrice">Cena sprzedaży</label>
                <input type="text" class="form-control" id="SellingPrice" name="sellingPrice" value="<?= $foundItem['Selling_price'] ?>">
            </div>
            <div class="form-group">
                <label for="Category">Kategoria</label>
                <select class="form-control" id="Category" name="category">
                    <?php
                    foreach ($foundCategories as $category) {
                        if ($category['ID'] == $foundItem['Category'])
                            echo '<option value=' . $category['ID'] . ' selected>' . $category['Name'] . '</option>';
                        else
                            echo '<option value=' . $category['ID'] . '>' . $category['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg">Zapisz zmiany</button>
            <a href="/ManageItems/ManageItem/<?= $foundItem['ID'] ?>" class="btn btn-danger btn-lg"> Wyjdź bez zmian</a>
        </form>
    </div>

</div>
<?= $this->endSection() ?>