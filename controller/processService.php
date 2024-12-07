<?php

require_once("../controller/connection.php");
require_once("../model/service.php");

/* Arquivo que processa o CREATE de serviços */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $clienteNome = $_POST["clienteNome"];
    $clienteEmail = $_POST["clienteEmail"];
    $clienteTelefone = $_POST["clienteTelefone"];
    $animalTipo = $_POST["animalTipo"];
    $animalNome = $_POST["animalNome"];
    $animalRaca = $_POST["animalRaca"];
    $servicoTipo = $_POST["servicoTipo"];
    $valor = $_POST["valor"];

    /* Chama o construtor apenas com a conexão de argumento */
    $service = new Servico($conn);
    /* Chama o método que inicializa o restante das variáveis */
    $service->inicializar($clienteNome,
    $clienteEmail,
    $clienteTelefone,
    $animalTipo,
    $animalNome,
    $animalRaca,
    $servicoTipo,
    $valor);

    /* VALIDAÇÃO DE ALGUM ERRO AQUI ??? */
    $service->salvar();

    /* Encerra a variável da conexão */
    $conn = null;

    /* Redireciona para a home */
    header("Location: ../view/home.php");
    exit;

}

?>