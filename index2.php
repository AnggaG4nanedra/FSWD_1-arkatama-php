<?php
// fungsi untuk menentukan pilihan komputer secara acak
function pilihanKomputer() {
    $pilihan = array("batu", "gunting", "kertas");
    $index = rand(0, 2);
    return $pilihan[$index];
}

// fungsi untuk menampilkan hasil pertandingan
function hasilPertandingan($pilihanManusia, $pilihanKomputer) {
    if ($pilihanManusia == $pilihanKomputer) {
        return "Seri";
    } elseif ($pilihanManusia == "batu" && $pilihanKomputer == "gunting" ||
        $pilihanManusia == "gunting" && $pilihanKomputer == "kertas" ||
        $pilihanManusia == "kertas" && $pilihanKomputer == "batu") {
        return "Anda Menang";
    } else {
        return "Komputer Menang";
    }
}

// mengecek apakah ada pilihan yang dipilih
if (isset($_POST['pilihan'])) {
    $pilihanManusia = $_POST['pilihan'];
    $pilihanKomputer = pilihanKomputer();
    $hasil = hasilPertandingan($pilihanManusia, $pilihanKomputer);
} else {
    $hasil = "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Jankenpon Game</title>
</head>
<body>
    <h1>Jankenpon Game</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="radio" name="pilihan" value="batu">Batu<br>
        <input type="radio" name="pilihan" value="gunting">Gunting<br>
        <input type="radio" name="pilihan" value="kertas">Kertas<br>
        <br>
        <input type="submit" value="Main">
    </form>
    <br>
    <?php if ($hasil != ""): ?>
        <p>Anda memilih: <?php echo $pilihanManusia; ?></p>
        <p>Komputer memilih: <?php echo $pilihanKomputer; ?></p>
        <p><?php echo $hasil; ?></p>
    <?php endif; ?>
</body>
</html>