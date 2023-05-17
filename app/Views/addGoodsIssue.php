<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function getMax() {
        var sel = document.getElementById("warehouseItemID");
        var text = sel.options[sel.selectedIndex].text;

        const myRegex = new RegExp('\\d+$');
        const myInt = text.match(myRegex);

        var amount = document.getElementById("Amount").max = myInt;
    }
</script>
<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="warehouseItemID">Nazwa towaru</label>
                <select class="form-control" id="warehouseItemID" onchange="getMax()" name="warehouseItemID" required>
                    <option disabled selected value> -- Wybierz towar -- </option>
                    <?php
                    foreach ($foundItems as $item) {
                        echo '
                    <option value=' . $item['ID'] . '>' . $item['Name'] . '; Alejka: ' . $item['Alley'] . '; Ilość: ' . $item['Amount'] . '</option>
                    ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Amount">Ilość</label>
                <input type="number" class="form-control" id="Amount" name="Amount">
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>