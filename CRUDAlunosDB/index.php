<?php

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/src/controllers/UserController.php';

$userController = new UserController($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset ($_POST['create'])){
        $userController->create($_POST['nome'], $_POST['email'], $_POST['matricula']);
        header("Location: index.php");
        exit; 
    } elseif(isset($_POST['update'])){
        $userController->update($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['matricula']);
        header("Location: index.php");
        exit; 
    } elseif(isset($_POST['delete'])) {
        $userController->delete($_POST['id']);
        header("Location: index.php");
        exit; 
    } 
}

$users = $userController->index();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>CRUD PHP</title>
</head>
<body>
    <h1>Alunos</h1>
    <form id="createForm" method="POST">
        <input type="text" id="createNome" name="nome" placeholder="Nome" required>
        <input type="email" id="createEmail" name="email" placeholder="Email" required>
        <input type="text" id="createMatricula" name="matricula" placeholder="Matricula" required>
        <button type="submit" name="create"> Adicionar </button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Matricula</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td> <?= $user['id'] ?></td>
                    <td> <?= $user['nome'] ?></td>
                    <td> <?= $user['email'] ?></td>
                    <td> <?= $user['matricula'] ?></td>
                    <td>
                        <button class= "edit btn" data-id="<?= $user['id'] ?>" data-nome="<?= $user['nome']?>" data-email="<?= $user['email']?>" data-matricula="<?= $user['matricula']?>">Editar</button>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id']?>">
                            <button type="submit" name="delete"> Delete </button>
                        </form>
                    </td>   
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">Editar Usuario</span>
            <form method="POST" >
                <input type="hidden" id=editId name = "id">
                <input type="text" id=editNome name = "nome" placeholder="Nome" required>
                <input type="email" id=editEmail name = "email" placeholder="Email" required>
                <input type="text" id=editMatricula name = "matricula" placeholder="Matricula" required>
                <button type="submit" name="update"> Atualizar </button>
            </form>
        </div>
    </div>
<script src="public/js/script.js"></script>
</body>
</html>