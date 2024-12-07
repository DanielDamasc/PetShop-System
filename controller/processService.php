<?php

require_once("../controller/connection.php");
require_once("../model/service.php");
include_once("../utilities/formatData.php");

/* Arquivo que processa o CREATE de serviços */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* Função que irá realizar a sanitização dos dados */
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

    /* Encerra a variável da conexão */
    $conn = null;

    /* Redireciona para a home */
    header("Location: ../view/home.php");
    exit;

}

?>