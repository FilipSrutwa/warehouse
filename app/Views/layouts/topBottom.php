<!DOCTYPE html>
<html lang="pl">
<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($title) ? $title : "warehouse") ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 5vh;">
        <a href="/MainMenu" class="navbar-brand" style="color:white;">HOME</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/ManageItems">Obsługa stanu magazynowego</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ManageAccounts">Zarządzaj kontami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WarehouseHistory">Zarządzanie przyjęciami/wydaniami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ManageContractors">Zarządzaj dostawcami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/SalesHistory">Historia sprzedaży</a>
                </li>';
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="/Logout">Wyloguj się</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content" style="height: 80vh;">
        <?= $this->renderSection('content') ?>
    </div>
    <div class="footer align-items-center justify-content-center bg-dark text-light text-center fixed-bottom" style="height: 5vh;">
        <p style="font-size: 2.5vh;">Warehouse system</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>