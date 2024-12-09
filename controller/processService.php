<?php

/* Importa conexão, classe Service, e arquivo que trata os dados */
require_once("../controller/connection.php");
require_once("../model/service.php");
include_once("../utilities/formatData.php");

/* Create */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* Função de sanitização dos dados */
    $dados = sanitizacao($_POST);

    /* Chama o construtor apenas com a conexão de argumento */
    $service = new Servico($conn);

    /* Chama o método que inicializa o restante das variáveis */
    $service->inicializar(
        $dados["clienteNome"],
        $dados["clienteEmail"],
        $dados["clienteTelefone"],
        $dados["animalTipo"],
        $dados["animalNome"],
        $dados["animalRaca"],
        $dados["servicoTipo"],
        $dados["valor"]
    );

    $service->salvar();

    /* Mensagem de SESSION do CREATE */
    session_start();
    $_SESSION["msg"] = "Serviço criado com sucesso!";

    /* Encerra a conexão */
    $conn = null;

    /* Redireciona para a home */
    header("Location: ../view/home.php");
    exit;

}

?>