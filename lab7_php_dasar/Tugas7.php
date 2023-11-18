<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP</title>
</head>
<body>
    <?php
    // Fungsi untuk menghitung umur berdasarkan tanggal lahir
    function hitungUmur($tanggal_lahir) {
        $today = new DateTime();
        $birthdate = new DateTime($tanggal_lahir);
        $umur = $today->diff($birthdate)->y;
        return $umur;
    }

    // Daftar pekerjaan beserta gaji
    $pekerjaan = array(
        "Programmer" => 5000000,
        "Designer" => 4500000,
        "Marketing" => 4000000,
        "Buruh" => 5600000,
        "PNS" => 2500000,
        "OP Warnet" => 1000000,
        "Office Boy" => 4000000,
        "Konten creator" => 5000000,
        "Idol" => 10000000,
        "Atlet" => 3500000,
        "Manager" => 4500000,

    );

    // Memproses form ketika disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama = $_POST["nama"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $pekerjaan_pilihan = $_POST["pekerjaan"];
        $NIM =$_POST["NIM"];

        // Menghitung umur
        $umur = hitungUmur($tanggal_lahir);

        // Mengambil gaji berdasarkan pekerjaan yang dipilih
        $gaji = isset($pekerjaan[$pekerjaan_pilihan]) ? $pekerjaan[$pekerjaan_pilihan] : "Pekerjaan tidak valid";

        // Menampilkan outputb
        echo "<h2>Output:</h2>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
        echo "<p>Umur: $umur tahun</p>";
        echo "<p>Pekerjaan: $pekerjaan_pilihan</p>";
        echo "<p>Gaji: Rp $gaji</p>";
    }
    ?>

    <!-- Form Input -->
    <h2>Form Input</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label for="NIM">NIM:</label>
        <input type="number" name="NIM"required><br><br>

        <label for="pekerjaan">Pekerjaan:</label>
        <select name="pekerjaan" required>
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Marketing">Marketing</option>
            <option value="Buruh">Buruh</option>
            <option value="PNS">PNS</option>
            <option value="OP Warnet">OP Warnet</option>
            <option value="Office Boy">OB</option>
            <option value="Konten creator">Konten creator</option>
            <option value="Idol">Idol</option>
            <option value="Atlet">Atlet</option>
            <option value="Manager">Manager</option>

        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
