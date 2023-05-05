<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="item">Nazwa towaru</label>
                <select class="form-control" id="item" name="item">
                    <?php
                    foreach ($foundItems as $item) {
                        if ($item['ID'] == $foundDelivery['Item'])
                            echo '
                        <option selected value=' . $item['ID'] . '>' . $item['Name'] . '; EAN: ' . $item['EAN'] . '; Dostawca: ' . $item['Contractor'] . '</option>
                        ';
                        else
                            echo '
                        <option value=' . $item['ID'] . '>' . $item['Name'] . '; EAN: ' . $item['EAN'] . '; Dostawca: ' . $item['Contractor'] . '</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Ilość</label>
                <input type="number" class="form-control" id="amount" name="amount" value=<?= $foundDelivery['Amount'] ?>>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-success">Zatwierdź zmiany</button>
            <a href="/Deliveries" class="btn btn-primary btn-lg btn-warning">Wyjdź bez zmian</a>
        </form>
    </div>

</div>
<?= $this->endSection() ?>