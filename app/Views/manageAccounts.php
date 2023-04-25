<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showAccount(accountID) {
        const path = `/ManageAccounts/Account/${accountID}`;
        window.location.assign(path);
    }
</script>
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
                <tr onclick=showAccount(' . $acc['ID'] . ')>
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