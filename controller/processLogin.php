<?php
include_once("../controller/connection.php");

/* Inicializa as variáveis que vão exibir as mensagens de erro */
$erro_pass = "";
$erro_user = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['l_email'];
    $senha = $_POST['l_senha'];

    $stmt = $conn->prepare("SELECT email, senha FROM user WHERE email = :email");
    ;
    $stmt->bindParam(":email", $email, );
    $stmt->execute();

    /* Verifica se o usuário existe */
    if ($stmt->rowCount() == 1) {

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $hash_pass = $row["senha"];

            /* Verifica se a senha bate */
            if (password_verify($senha, $hash_pass)) {

                /* Inicia uma variável de sessão usando o email */
                session_start();

                $_SESSION['email'] = $row['email'];

                /* Redireciona o usuário para a página de home */
                header("Location: ../view/home.php");
                exit;

            } else {
                $erro_pass = "Senha incorreta.";
            }
        }
    } else {
        $erro_user = "Nenhum usuário encontrado com esse email.";
    }

}

/* Encerra a variável da conexão */
$conn = null;

?>