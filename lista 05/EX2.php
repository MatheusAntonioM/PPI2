<?php
session_start();

class Carro {
    private $marca, $modelo, $ano;
    
    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }
    
    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getAno() { return $this->ano; }
    
    public function setMarca($marca) { $this->marca = $marca; }
    public function setModelo($modelo) { $this->modelo = $modelo; }
    public function setAno($ano) { $this->ano = $ano; }
    
    public function detalhes() {
        return "$this->marca, $this->modelo, $this->ano";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['ano'])) {
        $_SESSION['carro'] = new Carro($_POST['marca'], $_POST['modelo'], $_POST['ano']);
    }
    if (isset($_SESSION['carro'])) {
        $carro = $_SESSION['carro'];
        if (isset($_POST['nova_marca']) && $_POST['nova_marca'] !== '') $carro->setMarca($_POST['nova_marca']);
        if (isset($_POST['novo_modelo']) && $_POST['novo_modelo'] !== '') $carro->setModelo($_POST['novo_modelo']);
        if (isset($_POST['novo_ano']) && $_POST['novo_ano'] !== '') $carro->setAno($_POST['novo_ano']);
    }
}

$carro = isset($_SESSION['carro']) ? $_SESSION['carro'] : null;
?>

<html>
<head>
    <title>Gerenciamento de Carros</title>
</head>
<body>
    <h1>Cadastro de Carro</h1>
    <form method="post">
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="number" name="ano" placeholder="Ano" min="1900" max="<?php echo date('Y') + 1; ?>" required>
        <button type="submit">Cadastrar</button>
    </form>
    
    <?php 
    if ($carro) {
        echo "<p>Carro cadastrado: " . $carro->detalhes() . "</p>";
        echo "<h2>Atualizar Carro</h2>";
        echo '<form method="post">
                <input type="text" name="nova_marca" placeholder="Nova Marca">
                <input type="text" name="novo_modelo" placeholder="Novo Modelo">
                <input type="number" name="novo_ano" placeholder="Novo Ano" min="1900" max="' . (date('Y') + 1) . '">
                <button type="submit">Atualizar</button>
              </form>';
        echo "<p>Carro atualizado: " . $carro->detalhes() . "</p>";
    }
    ?>
</body>
</html>
