<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    $conn = new mysqli("localhost", "root", "27022006", "base_1");

    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepara os dados do formulário para inserção no banco de dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Prepara a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO mensagens_fale_conosco (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";

    // Executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi enviado, redireciona de volta para a página do formulário
    header("Location: sua_pagina_fale_conosco.php");
    exit();
}
?>
