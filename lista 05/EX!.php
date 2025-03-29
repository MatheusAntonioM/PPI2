<?php
class Veiculo {

    public $marca, $modelo, $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }
    public function exibirDetalhes() {
        return "{$this->marca}, {$this->modelo}, {$this->ano}";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $veiculo = new Veiculo($_POST['marca'], $_POST['modelo'], $_POST['ano']);
    $detalhes = $veiculo->exibirDetalhes();
}
?>

<html>
<head>
    <title>Cadastro de Veículo</title>
</head>
<body>
    <h1>Cadastro de Veículo</h1>
    <form method="post">
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="number" name="ano" placeholder="Ano" required>
        <button type="submit">Cadastrar</button>
    </form>
    <?php if (isset($detalhes)) echo "<p>$detalhes</p>"; ?>
</body>
</html>
