<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktivitas Dozer</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="page-container">
        <div class="page-form">
            <div class="card">
                <h2>PRODUKTIVITAS DOZER</h2>
                <h4>Input Data</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <br>
                    <label for="produksi">Produksi (m3)</label>
                    <input type="number" id="produksi" name="produksi" placeholder="" required>
                    <label for="cm">Siklus Waktu (menit)</label>
                    <input type="number" id="cm" name="cm" placeholder="" required>
                    <label for="efisiensi">Efisiensi Kerja (%)</label>
                    <input type="number" id="efisiensi" name="efisiensi" placeholder="" required>
                    <button type="submit">Kirim</button>
                </form>
            </div>
        </div>
        <div class="page-form-2">
            <div class="card-2">
                <label for="rumus">Rumus</label>
                <input type="text" value="Q = q x 60/Cm x E" disabled>
                <label for="jawaban">Jawaban</label>
                <input type="text" id="jawaban" value="<?php if (isset($_POST['produksi']) && isset($_POST['cm']) && isset($_POST['efisiensi'])) { echo number_format(calculateProductivity($_POST['produksi'], $_POST['cm'], $_POST['efisiensi']), 2); } else { echo ""; } ?>" disabled>
            </div>
            <br> <br>
            <a href="" type="button">Lanjutkan</a>
        </div>
    </div>

    <?php
    function calculateProductivity($produksi, $cycleTime, $efficiency) {
        return $produksi * (60 / $cycleTime) * $efficiency;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produksi = $_POST["produksi"];
        $cycleTime = $_POST["cm"];
        $efficiency = $_POST["efisiensi"];

        $productivity = calculateProductivity($produksi, $cycleTime, $efficiency);
    }
    ?>
</body>

</html>
