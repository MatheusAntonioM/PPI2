<?php

class Veiculo {
    public $marca, $modelo, $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function detalhes() {
        return "$this->marca, $this->modelo, $this->ano";
    }
}

class Carro extends Veiculo {
    public $numPortas;

    public function __construct($marca, $modelo, $ano, $numPortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->numPortas = $numPortas;
    }

    public function detalhes() {
        return parent::detalhes() . ", $this->numPortas portas";
    }
}

class Moto extends Veiculo {
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function detalhes() {
        return parent::detalhes() . ", $this->cilindradas cc";
    }
}

$veiculo = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];

    if ($tipo == 'carro') {
        $numPortas = $_POST['numPortas'];
        $veiculo = new Carro($marca, $modelo, $ano, $numPortas);
    } elseif ($tipo == 'moto') {
        $cilindradas = $_POST['cilindradas'];
        $veiculo = new Moto($marca, $modelo, $ano, $cilindradas);
    }
}
?>

<html>
<head>
    <title>Cadastro de Veículo</title>
</head>
<body>
    <h1>Cadastro de Veículo</h1>
    <form method="post">
        <select name="tipo" required>
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br><br>

        <input type="text" name="marca" placeholder="Marca" required><br><br>
        <input type="text" name="modelo" placeholder="Modelo" required><br><br>
        <input type="number" name="ano" placeholder="Ano" required><br><br>

        <div id="carroCampos">
            <input type="number" name="numPortas" placeholder="Número de Portas"><br><br>
        </div>

        <div id="motoCampos">
            <input type="number" name="cilindradas" placeholder="Cilindradas"><br><br>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <?php
    if ($veiculo) {
        echo "<h2>Detalhes do Veículo</h2>";
        echo "<p>" . $veiculo->detalhes() . "</p>";
    }
    ?>
</body>
</html>
