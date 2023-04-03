<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <div>
        <form action="POST">
            <div class="form-group">
                <label for="name">Nazwa towaru</label>
                <select class="form-control" id="name">
                    <option>Towar 1</option>
                    <option>Towar 2</option>
                    <option>Towar 3</option>
                    <option>Towar 4</option>
                    <option>Towar 5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contractor">Komu sprzedano (jeśli nie ma użytkownika zapisanego jako jeden z kontrahentów - zostaw puste lub dodaj do kontrahentów)</label>
                <select class="form-control" id="contractor">
                    <option> </option>
                    <option>Towar 1</option>
                    <option>Towar 2</option>
                    <option>Towar 3</option>
                    <option>Towar 4</option>
                    <option>Towar 5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Price">Cena sprzedaży</label>
                <input type="number" step="0.01" min=0 name="Price" id="Price">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>