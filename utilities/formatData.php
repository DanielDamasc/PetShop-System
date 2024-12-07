<?php

    function sanitizacao($post) {

        /* Dados são formatados e sanitizados em um array associativo para serem retornados */
        $dados = [
            'clienteNome' => filter_var($post['clienteNome'], FILTER_SANITIZE_SPECIAL_CHARS),
            'clienteEmail' => filter_var($post['clienteEmail'], FILTER_SANITIZE_EMAIL),
            'clienteTelefone' => filter_var($post['clienteTelefone'], FILTER_SANITIZE_NUMBER_INT),
            'animalTipo' => $post['animalTipo'],
            'animalNome' => filter_var($post['animalNome'], FILTER_SANITIZE_SPECIAL_CHARS),
            'animalRaca' => filter_var($post['animalRaca'], FILTER_SANITIZE_SPECIAL_CHARS),
            'servicoTipo' => $post['servicoTipo'],
            'valor' => filter_var($post['valor'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
        ];

        return $dados;
    }

?>