<?php

include_once("../view/header.php");
include_once("../controller/processList.php");

session_start();

/* Não deixa usuário entrar nessa URL se não tiver feito login */
if (!isset($_SESSION["email"])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<h1 style="margin-bottom: -24px;" id="main-title">Cliente: <?= $oneservice["clienteNome"] ?></h1>

<div id="view-service-container" class="container service-data">
    <div class="show-item d-flex">
        <p class="bold">Email:</p>
        <p><?= $oneservice["clienteEmail"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Telefone:</p>
        <p><?= $oneservice["clienteTelefone"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Nome do animal:</p>
        <p><?= $oneservice["animalNome"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Espécie:</p>
        <p><?= $oneservice["animalTipo"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Raça:</p>
        <p><?= $oneservice["animalRaca"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Tipo do serviço:</p>
        <p><?= $oneservice["servicoTipo"] ?></p>
    </div>

    <div class="show-item d-flex">
        <p class="bold">Valor:</p>
        <p><?= $oneservice["valor"] ?></p>
    </div>

    <div class="d-flex justify-content-end">
        <?php include_once("../components/backbtn.html"); ?>
    </div>
    
    
</div>

<?php

include_once("../view/footer.php");

?>