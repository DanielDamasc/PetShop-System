<?php

/* Inclui a conexão e a classe para criar os objetos */
include_once("../controller/connection.php");
require_once("../model/service.php");

$id;

/* Captura id na URL */
if (!empty($_GET)) {
  $id = $_GET["id"];
}

if (!empty($id)) {

  /* Retorna os dados de um contato (showService) */

  /* Variável que vai receber o serviço específico */
  $oneservice = null;

  /* Chama o construtor apenas com a conexão de argumento */
  $service = new Servico($conn);

  /* Chama o método que seleciona os atributos de um único registro */
  $oneservice = $service->mostrarUnico($id);

} else {

  /* Retorna todos os serviços (home) */

  /* Array que vai receber todos os serviços */
  $services = [];

  /* Chama o construtor apenas com a conexão de argumento */
  $service = new Servico($conn);

  /* Chama o método que seleciona alguns atributos de todos os registros */
  $services = $service->mostrarTodos();

}

/* Processamento para editar e deletar */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_POST["type"] === "edit") {
    /* id hidden para saber de qual vai atualizar */
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

    /* Chama o método de editar do model */
    $service->editar($id);

    /* Mensagem de SESSION do UPDATE */
    session_start();
    $_SESSION["msg"] = "Serviço atualizado com sucesso!";

    /* Redireciona para a página inicial */
    header("Location: ../view/home.php");
    exit;

  } else if ($_POST["type"] === "delete") {
    /* id para saber de qual vai deletar */
    $id = $_POST["id"];

    if ($id) {
      /* Chama o construtor e passa a conexão */
      $service = new Servico($conn);

      /* Função deletar, retorna true ou false */
      $deleted = $service->deletar($id);

      if ($deleted) {
        /* Retorna JSON de sucesso */
        echo json_encode(['success' => true, 'message' => 'Serviço deletado com sucesso.']);
      } else {
        /* Retorna JSON de erro */
        echo json_encode(['success' => false, 'message' => 'Erro ao deletar o serviço.']);
      }
      /* Retorna JSON para ID inválido */
    } else {
      echo json_encode(['success' => false, 'message' => 'ID inválido.']);
    }

    exit;
  }

}

?>