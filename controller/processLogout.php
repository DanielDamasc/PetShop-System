<?php

/* Destrói a SESSION e manda para a página de login */

session_start();
session_destroy();
header("Location: ../view/index.php");
exit;
?>