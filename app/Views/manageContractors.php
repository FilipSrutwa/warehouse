<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showContractor(contractorID) {
        const path = `/ManageContractors/Contractor/${contractorID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <div>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa firmy</th>
                    <th scope="col">Data początku współpracy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($foundContractors as $contractor) {
                    echo '
                    <tr  onclick=showContractor(' . $contractor['ID'] . ')>
                        <th scope="row">' . $i . '</th>
                        <td>' . $contractor['Name'] . '</td>
                        <td>' . $contractor['Created_at'] . '</td>
                    </tr>
                    ';
                    $i++;
                }

                ?>
            </tbody>
        </table>
    </div>

    <a href="/ManageContractors/addContractor" class="btn btn-lg btn-primary">Dodaj dostawcę</a>
</div>
<?= $this->endSection() ?>