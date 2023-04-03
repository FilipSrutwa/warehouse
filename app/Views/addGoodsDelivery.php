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
            <div class="border p-3">
                <p>Brak towaru? Dodaj nowy przy użyciu przycisku poniżej</p>
                <a href="#" class="btn btn-sm btn-success">Dodaj towar</a>
            </div>

            <div class="form-group">
                <label for="name">Dostawca</label>
                <select class="form-control" id="name">
                    <option>Dostawca 1</option>
                    <option>Dostawca 2</option>
                    <option>Dostawca 3</option>
                    <option>Dostawca 4</option>
                    <option>Dostawca 5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Amount">Ilość</label>
                <input type="number" class="form-control" id="Amount">
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
        </form>
    </div>

</div>
<?= $this->endSection() ?>