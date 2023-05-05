<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="alley">Alejka</label>
                <select class="form-control" id="alley" name="alley">
                    <?php
                    foreach ($foundAlleys as $alley) {
                        if ($alley['ID'] == $foundWarehouseItem['Alley_ID'])
                            echo '<option value=' . $alley['ID'] . ' selected>' . $alley['Name'] . '</option>';
                        else
                            echo '<option value=' . $alley['ID'] . '>' . $alley['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg">Zatwierdź zmiany</button>
            <a href="/ManageItems" class="btn btn-lg btn-warning">Opuść bez zmian</a>
        </form>
    </div>

</div>
<?= $this->endSection() ?>