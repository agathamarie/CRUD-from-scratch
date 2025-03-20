<?php
require_once('porquinhoController.php');

$porquinhoController = new PorquinhoController;
$porquinhos = $porquinhoController->pegarTodosPorquinhos();

$donoController = new DonoController;
?>

<?php include('header.php'); ?>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cor</th>
            <th>Gênero</th>
            <th>Tamanho</th>
            <th>Dono</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($porquinhos as $porquinho): ?>
        <?php
            $dono = $donoController->pegarDono($porquinho['id_dono'])
        ?>
        <tr>
            <td><?= htmlspecialchars($porquinho['nome']) ?></td>
            <td><?= htmlspecialchars($porquinho['cor']) ?></td>
            <td><?= htmlspecialchars($porquinho['genero']) ?></td>
            <td><?= htmlspecialchars($porquinho['tamanho']) ?></td>
            <td><?= htmlspecialchars($dono['nome']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>