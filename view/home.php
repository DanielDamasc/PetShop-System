<?php

include_once("../view/header.php");
include_once("../controller/processList.php");

session_start();

/* Não deixa usuário entrar nessa URL se não tiver feito login */
if (!isset($_SESSION['email'])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<main>
    <div class="container">
        <h1 id="main-title">Meus Serviços</h1>

        <!-- Faz a contagem dos serviços para decidir tratamento -->
        <?php if (count($services) > 0): ?>
            <!-- Tabela para exibir os serviços cadastrados -->
            <table class="table" id="services-table">
                <thead>
                    <tr>
                        <th scope="col">Nome do Cliente</th>
                        <th scope="col">Nome do Animal</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Valor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $oneservice): ?>
                        <tr>
                            <td scope="row"><?= $oneservice['clienteNome'] ?></td>
                            <td scope="row"><?= $oneservice['animalNome'] ?></td>
                            <td scope="row"><?= $oneservice['servicoTipo'] ?></td>
                            <td scope="row"><?= $oneservice['valor'] ?></td>
                            <td class="actions">

                                <!-- O id é passado na URL de destino -->
                                <a href="../view/showService.php?id=<?= $oneservice['id'] ?>"><i
                                        class="fas fa-eye check-icon"></i></a>

                                <a href="../view/editService.php?id=<?= $oneservice['id'] ?>"><i
                                        class="far fa-edit edit-icon"></i></a>

                                <button class="delete-btn" type="submit"><i class="fas fa-times delete-icon"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda não há serviços registrados. <a href="../view/newService.php">Clique aqui para
                    adicionar</a>.</p>
        <?php endif; ?>

    </div>
    <div class="circle d-flex align-items-center justify-content-center">
        <a class="addService" href="../view/newService.php">
            <i class="fas fa-plus"></i>
        </a>
    </div>

</main>

<?php

include_once("../view/footer.php");

?>