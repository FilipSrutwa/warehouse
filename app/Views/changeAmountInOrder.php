<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <form method="POST">
        <h2><?= $foundItem['Name'] ?></h2>
        <div class="form-group mt-3">
            <label for="amount">Ilość</label>
            <input type="number" name="amount" class="form-control" id="amount" onchange="getPrice()" min=1 max=<?= $foundWarehouseItem['Amount'] ?> value=<?= $foundOrderItem['Amount'] ?>>
        </div>
        <div class="form-group mt-3">
            <label for="price">Cena jednostkowa</label>
            <a>(sugerowana cena za sztukę wynosi: <?= $foundItem['Selling_price'] ?>)</a>
            <input type="number" name="price" class="form-control" id="price" value=<?= $foundOrderItem['Sell_price'] ?>>
        </div>
        <input type="hidden" name="orderID" value=<?= $foundOrderItem['ID'] ?>>
        <input type="hidden" name="suggestedUnitPrice" value=<?= $foundItem['Selling_price'] ?>>
        <button type="submit" class="btn btn-lg btn-success mt-3">Zmień ilość</button>
    </form>
</div>


<?= $this->endSection() ?>