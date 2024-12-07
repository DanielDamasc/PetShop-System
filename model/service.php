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

    public function __construct($clienteNome, $clienteEmail, $clienteTelefone, $animalTipo, $animalNome, $animalRaca, $servicoTipo, $valor, $conn)
    {
        $this->clienteNome = $clienteNome;
        $this->clienteEmail = $clienteEmail;
        $this->clienteTelefone = $clienteTelefone;
        $this->animalTipo = $animalTipo;
        $this->animalNome = $animalNome;
        $this->animalRaca = $animalRaca;
        $this->servicoTipo = $servicoTipo;
        $this->valor = $valor;
        $this->conn = $conn;
    }

    /* Função para create de um novo serviço, é utilizada no arquivo processService.php */
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

    /* FAZER UMA FUNÇÃO PARA UPDATE AQUI ??? */
}

?>