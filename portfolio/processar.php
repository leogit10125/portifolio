<?php


$servername = "localhost";
$username = "root";
$password = "Lgc101225#";
$dbname = "cadastro_clientes_do_leone";

$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Capturar dados do formulário com validação básica
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$produto = isset($_POST['produto']) ? $_POST['produto'] : '';

// Validar campos obrigatórios
if (empty($nome) || empty($email)) {
    die("Os campos 'Nome' e 'Email' são obrigatórios.");
}

// Preparar consulta para evitar injeção SQL
$stmt = $conn->prepare("INSERT INTO cadastro (nome, email, endereco, telefone, sexo, produto) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nome, $email, $endereco, $telefone, $sexo, $produto);

// Executar consulta e verificar sucesso
if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao realizar o cadastro: " . $stmt->error;
}

 //Fechar conexões
$stmt->close();
$conn->close();
?>
