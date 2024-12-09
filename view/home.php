<?php
include_once("../view/header.php");

/* Precisa do processList para mostrar dados */
include_once("../controller/processList.php");

/* Não deixa usuário entrar nessa URL sem login */
if (!isset($_SESSION["email"])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<main>
    <div class="container">
        <!-- Verifica se tem msg das operações feitas na SESSION -->
        <?php if (isset($_SESSION["msg"]) && $_SESSION["msg"] != ''): ?>
            <p style="max-width: 800px; margin: 0 auto;" class="alert alert-success text-center mt-3">
                <!-- Se true, mostra SESSION msg -->
                <?= $_SESSION["msg"] ?>
            </p>
        <?php endif;
        $_SESSION["msg"] = ""; ?>

        <h1 id="main-title">Meus Serviços</h1>

        <!-- Faz a contagem dos serviços para decidir -->
        <?php if (count($services) > 0): ?>

            <!-- Tabela para exibir os serviços cadastrados -->
            <table class="table" id="services-table">
                <thead>
                    <tr>
                        <!-- Atributos mais relevantes -->
                        <th scope="col">Nome do Cliente</th>
                        <th scope="col">Nome do Animal</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Valor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- $services = Array para todos -->
                    <!-- $uniqueService = Array para um de cada vez  -->
                    <?php foreach ($services as $uniqueService): ?>
                        <tr>
                            <td scope="row"><?= $uniqueService["clienteNome"] ?></td>
                            <td scope="row"><?= $uniqueService["animalNome"] ?></td>
                            <td scope="row"><?= $uniqueService["servicoTipo"] ?></td>
                            <td scope="row"><?= $uniqueService["valor"] ?></td>
                            <td class="actions">

                                <!-- id passado na URL de destino para os arquivos que precisam manipular um registro -->
                                <!-- Capturados pelo processList, buscados, e usados nos arquivos de saída -->

                                <a href="../view/showService.php?id=<?= $uniqueService["id"] ?>"><i
                                        class="fas fa-eye check-icon"></i></a>

                                <a href="../view/editService.php?id=<?= $uniqueService["id"] ?>"><i
                                        class="far fa-edit edit-icon"></i></a>

                                <!-- Versatilidade para fazer o delete usando form -->
                                <!-- Versão alterada para permitir o delete de forma assíncrona (AJAX) -->
                                <form class="delete-form" data-id="<?= $uniqueService["id"] ?>">

                                    <button class="delete-btn" type="button"><i class="fas fa-times delete-icon"></i></button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Para quando não há registros -->
        <?php else: ?>
            <p id="empty-list-text">Ainda não há serviços registrados. <a href="../view/newService.php">Clique aqui para
                    adicionar</a>.</p>
        <?php endif; ?>

    </div>
    <!-- Botão para adicionar novo serviço -->
    <div class="circle d-flex align-items-center justify-content-center">
        <a class="addService" href="../view/newService.php">
            <i class="fas fa-plus"></i>
        </a>
    </div>

    <!-- Adição do arquivo AJAX (js) -->
    <script src="../AJAX/delete.js"></script>

</main>

<?php

include_once("../view/footer.php");

?>