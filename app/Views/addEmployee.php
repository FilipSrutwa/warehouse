<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form action="POST">
            <div class="form-group">
                <label for="rights">Uprawnienia</label>
                <select class="form-control" id="rights">
                    <option>Kierownik</option>
                    <option>Pracownik fizyczny</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Surname">Nazwisko</label>
                <input type="text" class="form-control" id="Surname">
            </div>
            <div class="form-group">
                <label for="Name">Imię</label>
                <input type="text" class="form-control" id="Name">
            </div>
            <div class="form-group">
                <label for="Login">Login</label>
                <input type="text" class="form-control" id="Login">
            </div>
            <div class="form-group">
                <label for="Password">Hasło</label>
                <input type="password" class="form-control" id="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>