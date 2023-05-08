<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<script>
    function getMax() {
        var sel = document.getElementById("warehouseItemID");
        var text = sel.options[sel.selectedIndex].text;

        const myRegex = new RegExp('\\d+$');
        const myInt = text.match(myRegex);

        var amount = document.getElementById("amount").max = myInt;
    }

    function clearAmount() {
        var amount = document.getElementById("amount").value = 0;
    }

    function getPrice() {
        var sel = document.getElementById("warehouseItemID");
        var text = sel.options[sel.selectedIndex].text;

        const myRegex = new RegExp('\\d{1,}.\\d{2}');
        const myInt = text.match(myRegex);

        var price = document.getElementById("price").value = myInt;
    }
</script>

<div class="container">
    <form method="POST">
        <div class="form-group">
            <label for="warehouseItemID">Towar</label>
            <select class="form-control" name="warehouseItemID" onchange="getMax();clearAmount();getPrice()" id="warehouseItemID" required>
                <option disabled selected value> -- Wybierz towar -- </option>
                <?php
                foreach ($foundItems as $item) {
                    echo '<option value=' . $item['ID'] . '>Nazwa produktu: ' . $item['Name'] . '; Cena: ' . $item['Price'] . '; Alejka: ' . $item['Alley'] . '; Ilość: ' . $item['Amount'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Ilość</label>
            <input type="number" name="amount" class="form-control" id="amount">
        </div>
        <div class="form-outline">
            <label class="form-label" for="price">Cena jednostkowa</label>
            <input type="number" id="price" name="price" class="form-control" value="0" step="0.01" />
        </div>
        <input type="hidden" name="buyer" value=<?= $foundBuyer['ID'] ?>>
        <button type="submit" class="btn btn-lg btn-success mt-3">Dodaj</button>
    </form>

</div>


<?= $this->endSection() ?>