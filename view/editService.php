<?php

include_once("../view/header.php");

/* Precisa desse include para enxergar os elementos vindos do select por id */
include_once("../controller/processList.php");

session_start();

/* Não deixa usuário entrar nessa URL se não tiver feito login */
if (!isset($_SESSION['email'])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<main>
    <h1 style="text-align: center;">Editar Serviço</h1>
    <form style="margin-top: 0.6rem;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);" class="container p-4 border border-primary" method="POST"
        action="../controller/processList.php">

        <!-- Hidden inputs, usados para auxiliar o arquivo de processamento no POST -->
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $oneservice['id'] ?>">

        <!-- O nome do cliente é o único atributo que não pode ser editado -->

        <div class="form-group">
            <label for="clienteEmail">Email</label>
            <input type="email" class="form-control" name="clienteEmail" id="clienteEmail"
                placeholder="Insira o email do cliente" value="<?= $oneservice['clienteEmail'] ?>">
        </div>
        <div class="form-group">
            <label for="clienteTelefone">Telefone</label>
            <input type="tel" class="form-control" name="clienteTelefone" id="clienteTelefone"
                placeholder="Insira o telefone do cliente" value="<?= $oneservice['clienteTelefone'] ?>">
        </div>

        <div class="form-group">
            <label for="animalTipo">Tipo do Animal</label>
            <select class="form-control" name="animalTipo" id="animalTipo">
                <option value="cao" <?= $oneservice['animalTipo'] == 'cao' ? 'selected' : '' ?>>Cão</option>
                <option value="gato" <?= $oneservice['animalTipo'] == 'gato' ? 'selected' : '' ?>>Gato</option>
                <option value="coelho" <?= $oneservice['animalTipo'] == 'coelho' ? 'selected' : '' ?>>Coelho</option>
            </select>
        </div>

        <div class="form-group">
            <label for="animalNome">Nome do Animal</label>
            <input type="text" class="form-control" name="animalNome" id="animalNome"
                placeholder="Insira o nome do animal" value="<?= $oneservice['animalNome'] ?>">
        </div>
        <div class="form-group">
            <label for="animalRaca">Raça do Animal</label>
            <input type="text" class="form-control" name="animalRaca" id="animalRaca"
                placeholder="Insira a raça do animal" value="<?= $oneservice['animalRaca'] ?>">
        </div>

        <!-- Usar required em apenas um radio funciona para todos -->
        <div class="form-check">
            <input class="form-check-input" type="radio" value="banho" name="servicoTipo" id="banho" required>
            <label class="form-check-label" for="banho">Banho</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="tosa" name="servicoTipo" id="tosa">
            <label class="form-check-label" for="tosa">Tosa</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="unha" name="servicoTipo" id="unha">
            <label class="form-check-label" for="unha">Unhas</label>
        </div>

        <div class="form-group" style="margin-top: 16px;">
            <label for="valor">Valor do Serviço</label>
            <input type="number" class="form-control" name="valor" id="valor"
                placeholder="Insira o valor do serviço" step="0.01" value="<?= $oneservice['valor'] ?>">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <?php include_once("../components/backbtn.html"); ?>
        </div>
        
    </form>
</main>

<?php

include_once("../view/footer.php");

?>