<?php

include_once("../view/header.php");

/* Precisa desse include para ver os dados do Array $oneservice */
include_once("../controller/processList.php");


/* Não deixa usuário entrar nessa URL sem login */
if (!isset($_SESSION["email"])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<!-- O nome do cliente não pode ser alterado -->
<h1 style="margin: 200px 0 -24px; font-size: 32px" id="main-title">Cliente: <?= $oneservice["clienteNome"] ?></h1>

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