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
                        echo '<option value=' . $accType['ID'] . '>' . $accType['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Surname">Nazwisko</label>
                <input type="text" class="form-control" id="Surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="Name">Imię</label>
                <input type="text" class="form-control" id="Name" name="name" required>
            </div>
            <div class="form-group">
                <label for="Login">Login</label>
                <input type="text" class="form-control" id="Login" name="login" required>
            </div>
            <div class="form-group">
                <label for="Password">Hasło</label>
                <input type="password" class="form-control" id="Password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>