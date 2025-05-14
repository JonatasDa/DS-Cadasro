<?php
include("conn.php");

if (
    isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email']) &&
    isset($_POST['celular']) && isset($_POST['endereco']) && isset($_POST['rg']) &&
    isset($_POST['nascimento']) && isset($_POST['tel_comercial']) &&
    isset($_POST['tel_residencial']) && isset($_POST['tel_recado'])
) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $nascimento = $_POST['nascimento'];
    $tel_comercial = $_POST['tel_comercial'];
    $tel_residencial = $_POST['tel_residencial'];
    $tel_recado = $_POST['tel_recado'];

    $sql = "INSERT INTO clientes (nome, cpf, email, celular, endereco, rg, nascimento, tel_comercial, tel_residencial, tel_recado)
            VALUES (:nome, :cpf, :email, :celular, :endereco, :rg, :nascimento, :tel_comercial, :tel_residencial, :tel_recado)";

    $stmt = $pdo->prepare($sql);

    $sucesso = $stmt->execute([
        ':nome' => $nome,
        ':cpf' => $cpf,
        ':email' => $email,
        ':celular' => $celular,
        ':endereco' => $endereco,
        ':rg' => $rg,
        ':nascimento' => $nascimento,
        ':tel_comercial' => $tel_comercial,
        ':tel_residencial' => $tel_residencial,
        ':tel_recado' => $tel_recado
    ]);

    if ($sucesso) {
        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar usuário.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Campos obrigatórios faltando.']);
}