<?php
$servername = "localhost";
$username = "root"; 
$password = "root";
$dbname = "sistema_cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha_hashed')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
