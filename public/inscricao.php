<?php

include "../includes/oficinas.php";
include "../includes/cabecalho.php";

?>

<h2>Inscrição em Oficinas</h2>

<div class="card">

<form action="salvar-inscricao.php" method="POST">

    <p>
        <label>Nome Completo:</label><br>

        <input
            type="text"
            name="nome"
            required
            style="width:100%; padding:10px;">
    </p>

    <p>
        <label>E-mail:</label><br>

        <input
            type="email"
            name="email"
            required
            style="width:100%; padding:10px;">
    </p>

    <p>
        <label>Oficina:</label><br>

        <select
            name="oficina"
            required
            style="width:100%; padding:10px;">

            <option value="">
                Selecione uma oficina
            </option>

            <?php foreach($oficinas as $oficina): ?>

                <option value="<?php echo $oficina["id"]; ?>">

                    <?php echo $oficina["titulo"]; ?>

                </option>

            <?php endforeach; ?>

        </select>

    </p>

    <p>

        <input
            type="checkbox"
            name="aceite">

        Declaro que concordo com os termos.

    </p>

    <button
        type="submit"
        class="botao">

        Realizar Inscrição

    </button>

</form>

</div>

<?php include "../includes/rodape.php"; ?>