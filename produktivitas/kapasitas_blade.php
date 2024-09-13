<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktivitas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="page-container">
        <div class="page-form">
            <div class="card">
                <h2>Kapasitas Blade</h2>
                <h4>Input Data</h4>
                <form action="#" method="post">
                    <br>
                    <label for="panjang">Panjang (m)</label>
                    <input type="number" id="panjang" name="panjang" placeholder="" required>
                    <label for="tinggi_blade">Tinggi Blade (m)</label>
                    <input type="number" id="tinggi_blade" name="tinggi_blade" placeholder="" required>
                    <label for="faktor_blade">Faktor Blade</label>
                    <input type="number" id="faktor_blade" name="faktor_blade" placeholder="" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="page-form-2">
            <div class="card-2">
                <label for="rumus">Rumus</label>
                <input type="text" value="q = L x H2 x a" disabled>
                <label for="jawaban">Jawaban</label>
                <input type="text" id="jawaban" value="<?php if (isset($_POST['panjang']) && isset($_POST['tinggi_blade']) && isset($_POST['faktor_blade'])) { echo number_format(calculateCapacity($_POST['panjang'], $_POST['tinggi_blade'], $_POST['faktor_blade']), 2); } else { echo ""; } ?>" disabled>
            </div>
            <br> <br>
            <a href="waktu_siklus.php" type="button">Lanjutkan</a>
        </div>
    </div>

    <?php
    function calculateCapacity($panjang, $tinggiBlade, $faktorBlade) {
        return $panjang * pow($tinggiBlade, 2) * $faktorBlade;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $panjang = $_POST["panjang"];
        $tinggiBlade = $_POST["tinggi_blade"];
        $faktorBlade = $_POST["faktor_blade"];

        // Calculate capacity
        $kapasitas = calculateCapacity($panjang, $tinggiBlade, $faktorBlade);
    }
    ?>
</body>

</html>