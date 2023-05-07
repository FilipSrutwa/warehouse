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
        <div class="form-group mt-3">
            <label for="buyer">Komu sprzedano (jeśli nie ma użytkownika zapisanego jako jeden z kontrahentów - zostaw puste lub dodaj do kontrahentów)</label>
            <select class="form-control" id="buyer" name="buyer">
                <?php
                foreach ($foundBuyers as $buyer) {
                    echo '<option value=' . $buyer['ID'] . '>' . $buyer['Name'] . '</option>';
                }
                ?>
            </select>
        </div>
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
        <input type="hidden" id="price" value="0" name="price">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Dodaj zakup
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Czy na pewno dodać tę transakcję?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="color:red;">Jest to proces nieodwracalny, proszę upewnij się przed dodaniem, że wszystko zostało podane zgodnie z prawdą!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Powróć</button>
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


<?= $this->endSection() ?>