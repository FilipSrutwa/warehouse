<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container">
    <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundAccounts as $acc) {
                echo '
                <tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $acc['Login'] . '</td>
                    <td>' . $acc['Name'] . '</td>
                    <td>' . $acc['Surname'] . '</td>
                </tr>
                ';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <a href="/ManageAccounts/addEmployee" class="btn btn-lg btn-primary">Dodaj pracownika</a>
</div>
<?= $this->endSection() ?>