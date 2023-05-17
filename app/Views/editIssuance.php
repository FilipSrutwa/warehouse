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
                <label for="Amount">Ilość</label>
                <input type="number" class="form-control" id="Amount" name="Amount" value=<?= $foundIssuance['Amount'] ?> max=<?= $foundItem['Amount'] ?>>
            </div>
            <button type="submit" class="btn btn-primary">Zmień</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>