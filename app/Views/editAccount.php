<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="rights">Uprawnienia</label>
                <select class="form-control" id="rights" name="accType">
                    <?php
                    foreach ($foundAccTypes as $accType) {
                        if ($accType['ID'] == $foundAccount['Acc_type'])
                            echo '<option value=' . $accType['ID'] . ' selected>' . $accType['Name'] . '</option>';
                        else
                            echo '<option value=' . $accType['ID'] . '>' . $accType['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Surname">Nazwisko</label>
                <input type="text" class="form-control" id="Surname" name="surname" value=<?= $foundAccount['Surname'] ?> required>
            </div>
            <div class="form-group">
                <label for="Name">Imię</label>
                <input type="text" class="form-control" id="Name" name="name" value=<?= $foundAccount['Name'] ?> required>
            </div>
            <div class="form-group">
                <label for="Login">Login</label>
                <input type="text" class="form-control" id="Login" name="login" value=<?= $foundAccount['Login'] ?> required>
            </div>
            <div class="form-group">
                <label for="Password">Hasło</label>
                <input type="password" class="form-control" id="Password" name="password" value=<?= $foundAccount['Password'] ?> required>
            </div>
            <button type="submit" class="btn btn-success btn-lg">Zatwierdź zmiany</button>
            <a href="/ManageAccounts/Account/<?= $foundAccount['ID'] ?>" class="btn btn-lg btn-warning">Opuść bez zmian</a>
        </form>
    </div>

</div>
<?= $this->endSection() ?>