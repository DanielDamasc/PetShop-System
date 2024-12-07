<?php
include_once("../view/header.php");

session_start();

/* Não deixa usuário entrar nessa URL se não tiver feito login */
if (!isset($_SESSION["email"])) {
    header("Location: ../view/index.php");
    exit;
}

?>

<main>
    <h1 id="main-title">Novo Serviço</h1>
    <!-- Coloca o action para o arquivo de processamento que depois retorna os usuários para a HOME -->
    <!-- COMO FAZER O TRATAMENTO DOS CAMPOS ??? -->
    <form style="margin-top: 0.6rem;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);" class="container p-4 border border-primary" method="POST"
        action="../controller/processService.php">
        <div class="form-group">
            <label for="clienteNome">Nome Completo</label>
            <input type="text" class="form-control" name="clienteNome" id="clienteNome"
                placeholder="Insira o nome do cliente">
        </div>
        <div class="form-group">
            <label for="clienteEmail">Email</label>
            <input type="email" class="form-control" name="clienteEmail" id="clienteEmail"
                placeholder="Insira o email do cliente">
        </div>
        <div class="form-group">
            <label for="clienteTelefone">Telefone</label>
            <input type="tel" class="form-control" name="clienteTelefone" id="clienteTelefone"
                placeholder="Insira o telefone do cliente">
        </div>

        <div class="form-group">
            <label for="animalTipo">Tipo do Animal</label>
            <select class="form-control" name="animalTipo" id="animalTipo">
                <option value="cao">Cão</option>
                <option value="gato">Gato</option>
                <option value="coelho">Coelho</option>
            </select>
        </div>
        <div class="form-group">
            <label for="animalNome">Nome do Animal</label>
            <input type="text" class="form-control" name="animalNome" id="animalNome"
                placeholder="Insira o nome do animal">
        </div>
        <div class="form-group">
            <label for="animalRaca">Raça do Animal</label>
            <input type="text" class="form-control" name="animalRaca" id="animalRaca"
                placeholder="Insira a raça do animal">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" value="banho" name="servicoTipo" id="banho">
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
                placeholder="Insira o valor do serviço" step="0.01">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Cadastrar Serviço</button>
            <?php include_once("../components/backbtn.html"); ?>
        </div>
        
    </form>
</main>

<?php

include_once("../view/footer.php");

?>