<?php

/* Inicia session em todos os templates */
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Formatação do header de todas as páginas -->
    <header class="d-flex justify-content-between align-items-center px-3">
        <h1 class="flex-grow-1 text-center">PetShop Order Service</h1>

        <!-- Sempre que tiver email na SESSION, o usuário pode fazer Logout -->
        <?php if (isset($_SESSION["email"])): ?>
            <a style="font-size: 32px; color: white;" href="../controller/processLogout.php">
                <i class="fa fa-sign-out"></i>
            </a>
        <?php endif; ?>
    </header>