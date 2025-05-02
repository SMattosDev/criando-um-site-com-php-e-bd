<?php
session_start(); // Inicia a sessão

if (isset($_SESSION['usuario'])) {
    echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
} else {
    echo "Usuário não autenticado.";
}
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Home - php</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">

</head>

<body>
    <header class="cabecalho">
        <nav class="navegacao">
            <a href="home.php">Home</a>
            <a href="cadastro-produto.php">Cadastrar Produto</a>
        </nav>
    </header>

    <main>
        <h1>Bem-vindo ao sistema de produtos</h1>
        <p>Aqui você pode cadastrar e gerenciar seus produtos.</p>
    </main>
</body>

</html>