<?php
include("conexao.php");

if (isset($_POST['salvar'])) {
    $nome       = $_POST['nome'];
    $marca      = $_POST['marca'];
    $preco      = $_POST['preco'];
    $descricao  = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $categoria  = $_POST['categoria'];
    $caminho    = $_POST['caminho'];
    $ativo      = 1;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO produto 
            (nome, preco, marca, descricao, quantidade, categoria, caminho, ativo)
            VALUES
            (:nome, :preco, :marca, :descricao, :quantidade, :categoria, :caminho, :ativo)
        ");
        $stmt->bindParam(':nome',       $nome);
        $stmt->bindParam(':preco',      $preco);
        $stmt->bindParam(':marca',      $marca);
        $stmt->bindParam(':descricao',  $descricao);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':categoria',  $categoria);
        $stmt->bindParam(':caminho',    $caminho);
        $stmt->bindParam(':ativo',      $ativo, PDO::PARAM_BOOL);

        $stmt->execute();
        echo "<p class='sucesso'>Produto cadastrado com sucesso!</p>";
    } catch (Exception $e) {
        echo "<p class='erro'>Erro ao cadastrar produto: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="../css/cadastro-produto.css">
</head>

<body>
    <header class="cabecalho">
        <nav class="navegacao">
            <a href="home.php">Voltar para Home</a>
        </nav>
    </header>

    <h1>Cadastro de Produto</h1>

    <form method="POST" action="">
        <label>Nome do Produto:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Marca:</label><br>
        <input type="text" name="marca" required><br><br>

        <label>Preço:</label><br>
        <input type="text" name="preco" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" required></textarea><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" required><br><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria" required><br><br>

        <label>Caminho do Produto:</label><br>
        <input type="text" name="caminho" required><br><br>

        <button type="submit" name="salvar">Salvar</button>
    </form>
</body>

</html>