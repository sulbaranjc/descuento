<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Calculadora de Descuentos</title>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Calculadora de Descuentos</h1>

        <form action="./index.php" method="post">
            <div class="mb-3">
                <label for="price" class="form-label">Precio Base ($)</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="A">A - 10% de descuento</option>
                    <option value="B">B - 20% de descuento</option>
                    <option value="C">C - 30% de descuento</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular Descuento</button>
            <a href="./index.php" class="btn btn-secondary">Limpiar</a>
        </form>

<!-- Resultado del Cálculo -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price']) && isset($_POST['category'])) {
        $price = $_POST['price'];
        $category = $_POST['category'];
        $discount = ($category == 'A') ? 0.10 : (($category == 'B') ? 0.20 : 0.30); // calcular el descuento según la categoría con operador ternario
        $discount_amount = $price * $discount; // Cálculo del monto descontado
        $discount_percentage = $discount * 100; // Convertir el descuento a porcentaje
        $final_price = $price - $discount_amount;
        
        echo '<div class="alert alert-success mt-4" role="alert">';
        echo "<strong>Precio Inicial:</strong> $" . number_format($price, 2) . "<br>";
        echo "<strong>Descuento Aplicado:</strong> {$discount_percentage}% ( $" . number_format($discount_amount, 2) . " )<br>"; // Inclusión del monto descontado
        echo "<strong>Precio Final con Descuento:</strong> $" . number_format($final_price, 2);
        echo '</div>';
    }
?>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
    // Establecer el foco en el campo de precio al cargar la página y al recargarla.
    $(document).ready(function() {
        $("#price").focus();
    });
    </script>
</body>
</html>
