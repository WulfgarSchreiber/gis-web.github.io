<?php
include "func.php";

if(isset($_POST["simpan"])){
    try {
        $q=$db->prepare("insert into harga_produk set nama_produk=?, 
        harga=?");
        $q->execute([$_POST["nama_produk"],$_POST["harga"]]);

        $_SESSION["notif"]="Data Berhasil Disimpan.";
        header("Location: harga.php");
        die();

    }catch(Exception $e) {
        echo "Error : ".$e->getMessage();
    }
}

if(isset($_POST["ubah"])){
    try {
        $q = $db->prepare("UPDATE produk SET nama_produk=?, 
        kategori=?, stok=?");
        $q->execute([$_POST["nama_produk"],$_POST["harga"]]); 

        $_SESSION["notif"] = "Data Berhasil diperbaharui.";
        header("Location: harga.php");
        die();

    } catch(Exception $e) {
        echo "Error : ".$e->getMessage();
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "hapus" && isset($_GET["id"])) {
    try {
        $q = $db->prepare("DELETE FROM harga_produk WHERE nama_produk = ?");
        $q->execute([$_GET["id"]]);
        $_SESSION["notif"] = "Data Berhasil dihapus.";
        header("Location: harga.php");
        die();
    } catch(Exception $e) {
        $_SESSION["notif"] = "Data Gagal dihapus. Error: " . $e->getMessage();
        header("Location: table.php");
        die();
    }
}
?>