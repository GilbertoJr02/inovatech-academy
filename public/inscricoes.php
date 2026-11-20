<?php

include "../includes/oficinas.php";
include "../includes/cabecalho.php";

$arquivo = __DIR__ . "/../dados/inscricoes.json";

$inscricoes = [];

if(file_exists($arquivo))
{
    $conteudo = file_get_contents($arquivo);

    $inscricoes = json_decode(
        $conteudo,
        true
    );

    if(!$inscricoes)
    {
        $inscricoes = [];
    }
}

?>

<h2>Inscrições Realizadas</h2>

<div class="card">

    <h3>
        Total de inscrições:
        <?php echo count($inscricoes); ?>
    </h3>

</div>

<?php foreach($inscricoes as $inscricao): ?>

<div class="card">

    <p>
        <strong>Nome:</strong>
        <?php echo $inscricao["nome"]; ?>
    </p>

    <p>
        <strong>E-mail:</strong>
        <?php echo $inscricao["email"]; ?>
    </p>

    <?php

    $nomeOficina = "Oficina não encontrada";

    foreach($oficinas as $oficinaAtual)
    {
        if($oficinaAtual["id"] == $inscricao["oficina"])
        {
            $nomeOficina = $oficinaAtual["titulo"];
            break;
        }
    }

    ?>

    <p>
        <strong>Oficina:</strong>
        <?php echo $nomeOficina; ?>
    </p>

    <p>
        <strong>Data:</strong>
        <?php echo $inscricao["data"]; ?>
    </p>

</div>

<?php endforeach; ?>

<?php include "../includes/rodape.php"; ?>