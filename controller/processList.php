<?php

include_once("../controller/connection.php");
require_once("../model/service.php");

$id;

if (!empty($_GET)) {
  $id = $_GET["id"];
}

/* PODEMOS IMPLEMENTAR ESSAS FUNCIONALIDADES NO MODEL ??? */

if (!empty($id)) {

  /* Retorna os dados de um contato (showService) */
  /* Seleciona os dados relativos ao id para o showService encontrar */

  $stmt = $conn->prepare("SELECT * FROM servico WHERE id = :id");
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $oneservice = $stmt->fetch();

} else {

  /* Retorna todos os contatos */

  /* Incializa a variável que vai receber os serviços como um array vazio */
  $services = [];

  /* Seleciona também o id para a funcionalidade do showService */
  $stmt = $conn->prepare("SELECT id, clienteNome, animalNome, servicoTipo, valor 
    FROM servico");
  $stmt->execute();

  $services = $stmt->fetchAll();
}



/* Para a funcionalidade de editar (usando POO) */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_POST["type"] === "edit") {
    /* id para saber de qual vai atualizar */
    $id = $_POST["id"];

    /* Nome do Cliente que veio do hidden para editar */
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

    /* Chama a função de editar da classe no model */
    $service->editar($id);

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

    /* Fica na mesma página após o delete */
    header("Location: ../view/home.php");
    exit;
  }

}


?>