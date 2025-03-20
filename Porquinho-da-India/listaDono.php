<?php
require_once('donoController.php');
require_once('porquinhoController.php');

$donoController = new DonoController;
$donos = $donoController->pegarTodosDonos();

$porquinhoController = new PorquinhoController;
?>

<?php include('header.php'); ?>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Idade</th>
            <th>Porquinhos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donos as $dono): ?>
        <?php 
            $porquinhos = $porquinhoController->pegarPorquinhosDono($dono['id']);
        ?>
        <tr>
            <td><?= htmlspecialchars($dono['nome']) ?></td>
            <td><?= htmlspecialchars($dono['genero']) ?></td>
            <td><?= htmlspecialchars($dono['data_nascimento']) ?></td>
            <td>
                <?php foreach($porquinhos as $porquinho): ?>
                    <a href="#"><?= htmlspecialchars($porquinho['nome']) ?></a>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>