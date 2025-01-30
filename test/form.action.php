<?php
include "func.php";

if(isset($_POST["simpan"])){
    try {
        $q=$db->prepare("insert into produk set nama_produk=?, 
        kategori=?, stok=?, harga=?, gambar=?");
        $q->execute([$_POST["nama_produk"],$_POST["kategori"],$_POST["stok"],$_POST["harga"],$_POST["gambar"]]);

        $_SESSION["notif"]="Data Berhasil Disimpan.";
        header("Location: table.php");
        die();

    }catch(Exception $e) {
        echo "Error : ".$e->getMessage();
    }
}

if(isset($_POST["ubah"])){
    try {
        $q = $db->prepare("UPDATE produk SET nama_produk=?, 
        kategori=?, stok=?, harga=?, gambar=? WHERE id=?");
        $q->execute([$_POST["nama_produk"],$_POST["kategori"],$_POST["stok"], $_POST["harga"], $_POST["gambar"]]); 

        $_SESSION["notif"] = "Data Berhasil diperbaharui.";
        header("Location: table.php");
        die();

    } catch(Exception $e) {
        echo "Error : ".$e->getMessage();
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "hapus" && isset($_GET["id"])) {
    try {
        $q = $db->prepare("DELETE FROM produk WHERE nama_produk = ?");
        $q->execute([$_GET["id"]]);
        $_SESSION["notif"] = "Data Berhasil dihapus.";
        header("Location: table.php");
        die();
    } catch(Exception $e) {
        $_SESSION["notif"] = "Data Gagal dihapus. Error: " . $e->getMessage();
        header("Location: table.php");
        die();
    }
}
?>