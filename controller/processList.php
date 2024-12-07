<?php

include_once("../controller/connection.php");
require_once("../model/service.php");

$id;

if (!empty($_GET)) {
  $id = $_GET["id"];
}

if (!empty($id)) {

  /* Retorna os dados de um contato (showService) */

  /* Incializa a variável que vai receber o serviço do método mostrarUnico */
  $oneservice = null;

  /*  Chama o construtor apenas com a conexão de argumento */
  $service = new Servico($conn);

  /* Chama o método que seleciona os atributos de um unico registro (para icon eye) */
  $oneservice = $service->mostrarUnico($id);

} else {

  /* Retorna todos os serviço */

  /* Incializa a variável que vai receber os serviços do método mostrarTodos */
  $services = [];

  /*  Chama o construtor apenas com a conexão de argumento */
  $service = new Servico($conn);

  /* Chama o método que seleciona os principais atributos de todos os registros (para a listagem na home) */
  $services = $service->mostrarTodos();

}

/* PROCESSAMENTO PARA EDITAR e DELETAR */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_POST["type"] === "edit") {
    /* id para saber de qual vai atualizar */
    $id = $_POST["id"];

    /* Nome do Cliente que veio do hidden */
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
    $service->inicializar(
      $clienteNome,
      $clienteEmail,
      $clienteTelefone,
      $animalTipo,
      $animalNome,
      $animalRaca,
      $servicoTipo,
      $valor
    );

    /* Chama a função de editar da classe no model */
    $service->editar($id);

    /* Mensagem de operação UPDATE */
    session_start();
    $_SESSION["msg"] = "Serviço atualizado com sucesso!";

    /* Redireciona para a página inicial após o update */
    header("Location: ../view/home.php");
    exit;

  } else if ($_POST["type"] === "delete") {
    /* id para saber de qual vai deletar */
    $id = $_POST["id"];

    /* Chama apenas o construtor que passa a conexão (não precisa de argumentos) */
    $service = new Servico($conn);

    /* Chama a função para deletar um registro no model */
    $service->deletar($id);

    /* Mensagem de operação DELETE */
    session_start();
    $_SESSION["msg"] = "Serviço deletado com sucesso!";

    /* Fica na mesma página após o delete */
    header("Location: ../view/home.php");
    exit;
  }

}


?>