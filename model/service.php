<?php

class Servico
{

    private $clienteNome;
    private $clienteEmail;
    private $clienteTelefone;
    private $animalTipo;
    private $animalNome;
    private $animalRaca;
    private $servicoTipo;
    private $valor;
    private $conn;

    /* Construtor nulo (facilita algumas operações) */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /* Método para inicializar os atributos (funciona como o construtor) */
    public function inicializar($clienteNome, $clienteEmail, $clienteTelefone, $animalTipo, $animalNome, $animalRaca, $servicoTipo, $valor)
    {
        $this->clienteNome = $clienteNome;
        $this->clienteEmail = $clienteEmail;
        $this->clienteTelefone = $clienteTelefone;
        $this->animalTipo = $animalTipo;
        $this->animalNome = $animalNome;
        $this->animalRaca = $animalRaca;
        $this->servicoTipo = $servicoTipo;
        $this->valor = $valor;
    }

    /* CREATE de um serviço (processService.php) */
    public function salvar()
    {
        $stmt = $this->conn->prepare("INSERT INTO 
        servico (clienteNome, clienteEmail, clienteTelefone, animalTipo, animalNome, animalRaca, servicoTipo, valor) 
        VALUES (:clienteNome , :clienteEmail , :clienteTelefone , :animalTipo , :animalNome , :animalRaca , :servicoTipo, :valor)");

        $stmt->bindParam(":clienteNome", $this->clienteNome);
        $stmt->bindParam(":clienteEmail", $this->clienteEmail);
        $stmt->bindParam(":clienteTelefone", $this->clienteTelefone);
        $stmt->bindParam(":animalTipo", $this->animalTipo);
        $stmt->bindParam(":animalNome", $this->animalNome);
        $stmt->bindParam(":animalRaca", $this->animalRaca);
        $stmt->bindParam(":servicoTipo", $this->servicoTipo);
        $stmt->bindParam(":valor", $this->valor);

        return $stmt->execute();
    }

    /* EDIT de um serviço (processList.php) */
    public function editar($id)
    {
        $stmt = $this->conn->prepare("UPDATE servico SET clienteEmail = :clienteEmail, clienteTelefone = :clienteTelefone, 
        animalTipo = :animalTipo, animalNome = :animalNome, animalRaca = :animalRaca, servicoTipo = :servicoTipo, 
        valor = :valor WHERE id = :id AND clienteNome = :clienteNome");

        $stmt->bindParam(":clienteNome", $this->clienteNome);
        $stmt->bindParam(":clienteEmail", $this->clienteEmail);
        $stmt->bindParam(":clienteTelefone", $this->clienteTelefone);
        $stmt->bindParam(":animalTipo", $this->animalTipo);
        $stmt->bindParam(":animalNome", $this->animalNome);
        $stmt->bindParam(":animalRaca", $this->animalRaca);
        $stmt->bindParam(":servicoTipo", $this->servicoTipo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

    }

    /* DELETE de um serviço (processList.php) */
    public function deletar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM servico WHERE id = :id");

        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    /* SELECT de todos os serviços (processList.php) */
    public function mostrarTodos()
    {
        $services = [];

        $stmt = $this->conn->prepare("SELECT id, clienteNome, animalNome, servicoTipo, valor 
        FROM servico");
        $stmt->execute();

        $services = $stmt->fetchAll();
        return $services;
    }

    /* SELECT de um serviços (processList.php) */
    public function mostrarUnico($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM servico WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $oneservice = $stmt->fetch();

        return $oneservice;
    }

}

?>