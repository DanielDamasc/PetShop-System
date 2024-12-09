<?php

include_once("../view/header.php");

/* Form não tem action, ao invés disso inclui o arquivo de processamento */
include("../controller/processLogin.php");

/* Redireciona para a home quando tem email na SESSION */
if(isset($_SESSION["email"])){
    header("Location: ../view/home.php");
}


?>

<main>

    <div class="main-container container d-flex flex-wrap flex-row align-items-stretch">

        <div class="desc-container container d-flex align-items-center justify-content-center border border-primary">
            <article style="font-size: 18px;">
                <p>Bem-vindo ao Sistema de Ordem de Serviço de Petshop! 🐾🐶🐱</p>
                <p>Nosso sistema foi desenvolvido para tornar a gestão dos serviços do seu petshop mais simples,
                    eficiente e organizada. Aqui, você pode:</p>
                <ul>
                    <li>✅ Cadastrar clientes e seus pets em uma nova Ordem de Serviço.</li>
                    <li>✅ Editar informações das suas Ordens de Serviço.</li>
                    <li>✅ Remover Ordens de Serviço.</li>
                </ul>
                <p>Estamos aqui para ajudar você a oferecer o melhor cuidado para os pets e uma experiência incrível
                    para os tutores! 🌟</p>
                <p>👉 Comece agora mesmo e facilite a rotina do seu petshop! 🐕🐾</p>
            </article>
        </div>

        <div class="login-container container d-flex align-items-center justify-content-center border border-primary">
            <form action="" method="POST">
                <h1>Entrar</h1>
                <div class="form-group">
                    <label style="font-size: 20px;" for="l_email">E-mail</label>
                    <input type="text" class="form-control" name="l_email" id="l_email" placeholder="Insira o seu email"
                        required>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px;" for="l_senha">Senha</label>
                    <input type="password" class="form-control" name="l_senha" id="l_senha"
                        placeholder="Insira a sua senha" required>
                </div>

                <!-- Exibe mensagens de erro do process -->
                <?php
                if (!empty($erro_user)) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($erro_user) . '</div>';
                } else if (!empty($erro_pass)) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($erro_pass) . '</div>';
                }
                ?>

                <input class="btn btn-primary" id="login-btn" type="submit" value="Enviar">
            </form>
        </div>

    </div>

</main>

<?php

include_once("../view/footer.php");

?>