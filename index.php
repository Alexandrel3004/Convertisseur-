<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur</title>
    <link rel="stylesheet" href="./style/bootstrap.css">
    <link rel="stylesheet" href="./style/style.css">

</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Convertisseur de température</h1>

        <!-- Centre le formulaire avec une largeur réduite -->
        <div class="d-flex justify-content-center mt-4">
            <div class="card p-4 col-md-6"> <!-- Ajuste la largeur à 50% sur les grands écrans -->
                <form action="" method="POST">
                    <!-- Température -->
                    <div class="form-floating mb-3">
                        <input type="number" name="temp" id="temp" class="form-control" placeholder="Température" required>
                        <label for="temp">Température (°)</label>
                    </div>

                    <!-- Unité -->
                    <div class="form-floating mb-3">
                        <select name="unite" id="unite" class="form-select" required>
                            <option value="C">Celsius (°C)</option>
                            <option value="F">Fahrenheit (°F)</option>
                            <option value="K">Kelvin (°K)</option>
                        </select>
                        <label for="unite">Unité</label>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Convertir" class="btn btn-outline-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'convertisseur.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $t = $_POST['temp'];
        $from = $_POST['unite'];
        new convertisseur($t, $from);
    }
    ?>

    <footer class="text-center mt-5 py-3 bg-light">
        <div class="container">
            <p class="text-muted mb-0">© 2024 Convertisseur de Température. Tous droits réservés.</p>
            <p class="text-muted mb-0">Développé par Loncle Alexandre</p>
        </div>
    </footer>

    <script src="./style/bootstrap.bundle.min.js"></script>
</body>

</html>
