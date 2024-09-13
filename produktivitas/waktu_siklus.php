<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu Siklus</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="page-container">
        <div class="page-form">
            <div class="card">
                <h2>Waktu Siklus</h2>
                <h4>Input Data</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <br>
                    <label for="jarak">Jarak Angkut (meter)</label>
                    <input type="number" id="jarak" name="jarak" placeholder="" required>
                    <label for="kmaju">Kecepatan Maju (m/s)</label>
                    <input type="number" id="kmaju" name="kmaju" placeholder="" required>
                    <label for="kmundur">Kecepatan Mundur (m/s)</label>
                    <input type="number" id="kmundur" name="kmundur" placeholder="" required>
                    <label for="prosneling">Ganti Prosneling (menit)</label>
                    <input type="number" id="prosneling" name="prosneling" placeholder="" required>
                    <button type="submit">Kirim</button>
                </form>
            </div>
        </div>
        <div class="page-form-2">
            <div class="card-2">
                <label for="rumus">Rumus</label>
                <input type="text" value="𝐶𝑚 = Ｄ/𝐹 + 𝐷/𝑅 + 𝑧" disabled>
                <label for="jawaban">Jawaban</label>
                <input type="text" id="jawaban" value="<?php if (isset($_POST['jarak']) && isset($_POST['kmaju']) && isset($_POST['kmundur']) && isset($_POST['prosneling'])) { echo number_format(calculateCm($_POST['jarak'], $_POST['kmaju'], $_POST['kmundur'], $_POST['prosneling'])); } else { echo ""; } ?>" disabled>
            </div>
            <br> <br>
            <a href="produktivitas_dozer.php" type="button">Lanjutkan</a>
        </div>
    </div>

    <?php
    function calculateCm($jarak, $kmaju, $kmundur, $prosneling) {
        return $jarak / $kmaju + $jarak / $kmundur + $prosneling;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jarak = $_POST["jarak"];
        $kmaju = $_POST["kmaju"];
        $kmundur = $_POST["kmundur"];
        $prosneling = $_POST["prosneling"];

        $cycleTime = calculateCm($jarak, $kmaju, $kmundur, $prosneling);
    }
    ?>

</body>

</html>
