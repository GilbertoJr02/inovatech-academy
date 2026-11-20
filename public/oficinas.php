<?php

include "../includes/oficinas.php";
include "../includes/cabecalho.php";

?>

<h2>Catálogo de Oficinas</h2>

<p>
Conheça as oficinas disponíveis na InovaTech Academy.
</p>

<?php foreach ($oficinas as $oficina): ?>

<div class="card">

    <h3>
        <?php echo $oficina["titulo"]; ?>
    </h3>

    <p>
        <strong>Categoria:</strong>
        <?php echo $oficina["categoria"]; ?>
    </p>

    <p>
        <strong>Carga Horária:</strong>
        <?php echo $oficina["carga_horaria"]; ?>
    </p>

    <p>
        <?php echo $oficina["descricao"]; ?>
    </p>

</div>

<?php endforeach; ?>

<?php include "../includes/rodape.php"; ?>