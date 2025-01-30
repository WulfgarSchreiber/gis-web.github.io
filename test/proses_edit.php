<?php
session_start();
include 'func.php';

if(isset($_POST["ubah"])){
    try {
        $id = $_POST["id"];
        $fields = [];
        $values = [];

        // Periksa setiap input, hanya update jika tidak kosong
        if (!empty($_POST["nama_produk"])) {
            $fields[] = "nama_produk=?";
            $values[] = $_POST["nama_produk"];
        }
        if (!empty($_POST["kategori"])) {
            $fields[] = "kategori=?";
            $values[] = $_POST["kategori"];
        }
        if (!empty($_POST["stok"])) {
            $fields[] = "stok=?";
            $values[] = $_POST["stok"];
        }
        if (!empty($_POST["harga"])) {
            $fields[] = "harga=?";
            $values[] = $_POST["harga"];
        }

        // Handle upload gambar jika ada
        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = time() . "_" . $_FILES["gambar"]["name"];
            move_uploaded_file($_FILES["gambar"]["tmp_name"], "uploads/" . $gambar);

            $fields[] = "gambar=?";
            $values[] = $gambar;
        }

        // Pastikan ada data yang diupdate
        if (!empty($fields)) {
            $sql = "UPDATE produk SET " . implode(", ", $fields) . " WHERE id=?";
            $values[] = $id;

            $q = $db->prepare($sql);
            $q->execute($values);

            $_SESSION["notif"] = "Data Berhasil diperbaharui.";
        } else {
            $_SESSION["notif"] = "Tidak ada perubahan yang dilakukan.";
        }

        header("Location: table.php");
        die();

    } catch(Exception $e) {
        echo "Error : ".$e->getMessage();
    }
}
?>
