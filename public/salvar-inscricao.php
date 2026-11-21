<?php

include "../includes/oficinas.php";
include "../includes/cabecalho.php";

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$oficina = $_POST["oficina"] ?? "";
$aceite = isset($_POST["aceite"]);

$erros = [];

if(strlen($nome) < 3){
    $erros[] = "Nome deve possuir pelo menos 3 caracteres.";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erros[] = "E-mail inválido.";
}

if(empty($oficina)){
    $erros[] = "Selecione uma oficina.";
}

if(!$aceite){
    $erros[] = "É necessário aceitar os termos.";
}

if(!empty($erros))
{
    echo "<div class='card'>";
    echo "<h2>Erros encontrados</h2>";

    foreach($erros as $erro)
    {
        echo "<p>$erro</p>";
    }

    echo "<a class='botao' href='inscricao.php'>";
    echo "Voltar";
    echo "</a>";

    echo "</div>";

    include "../includes/rodape.php";
    exit;
}

/* ==========================
   SALVAR NO JSON
========================== */

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

foreach($inscricoes as $inscricaoAtual)
{
    if(
        strtolower($inscricaoAtual["email"])
        ==
        strtolower($email)
    )
    {
        echo "<div class='card'>";

        echo "<h2>Inscrição já existente</h2>";

        echo "<p>";

        echo "Este e-mail já possui uma inscrição cadastrada.";

        echo "</p>";

        echo "<a class='botao' href='inscricao.php'>";

        echo "Voltar";

        echo "</a>";

        echo "</div>";

        include "../includes/rodape.php";

        exit;
    }
}

$novaInscricao = [

    "nome" => $nome,
    "email" => $email,
    "oficina" => $oficina,
    "data" => date("d/m/Y H:i:s")
];

$inscricoes[] = $novaInscricao;

$resultadoGravacao = file_put_contents(
    $arquivo,
    json_encode(
        $inscricoes,
        JSON_PRETTY_PRINT |
        JSON_UNESCAPED_UNICODE
    )
);

if($resultadoGravacao === false)
{
    echo "<div class='card'>";

    echo "<h2>Erro ao salvar inscrição</h2>";

    echo "<p>";

    echo "Não foi possível gravar os dados no arquivo JSON.";

    echo "</p>";

    echo "<a class='botao' href='inscricao.php'>";

    echo "Voltar";

    echo "</a>";

    echo "</div>";

    include "../includes/rodape.php";

    exit;
}

?>

<div class="card">

    <h2>Inscrição realizada com sucesso!</h2>

    <p>
        Obrigado pela inscrição,
        <strong><?php echo $nome; ?></strong>.
    </p>

    <p>
        E-mail informado:
        <strong><?php echo $email; ?></strong>
    </p>

    <p>
        Seus dados foram registrados com sucesso.
    </p>

    <a class="botao" href="inscricoes.php">
        Ver inscrições
    </a>

</div>

<?php include "../includes/rodape.php"; ?>