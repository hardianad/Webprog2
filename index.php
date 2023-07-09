<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari inputan form
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $foto = $_POST["foto"];

    // Membuat array dengan data baru
    $dataBaru = array(
        "kode" => $kode,
        "nama" => $nama,
        "harga" => $harga,
        "foto" => $foto
    );

    // Menambahkan data baru ke dalam session
    if (isset($_SESSION["makanan"])) {
        $_SESSION["makanan"][] = $dataBaru;
    } else {
        $_SESSION["makanan"] = array($dataBaru);
    }
	
	if(count($_SESSION["makanan"]) > 0)
	{
		$index = count($_SESSION["makanan"]) - 1;
		echo "Data " . $_SESSION["makanan"][$index]["nama"] . " berhasil dimasukkan";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Makanan</title>
</head>
<body>
    <a target="_blank" href="order.php" style="margin-top: 15px; display: block; width: 85px; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Halaman Order</a>
	<br>
    <form method="POST">
        <label for="kode">Kode Makanan:</label><br>
        <input type="text" id="kode" name="kode"><br><br>
        
        <label for="nama">Nama Makanan:</label><br>
        <input type="text" id="nama" name="nama"><br><br>
        
        <label for="harga">Harga Makanan:</label><br>
        <input type="text" id="harga" name="harga"><br><br>
        
        <label for="foto">URL Foto Makanan:</label><br>
        <input type="text" id="foto" name="foto"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
