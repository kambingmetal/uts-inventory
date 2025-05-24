<?php
// require_once __DIR__ . '/vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// $host = $_ENV['MYSQLHOST'];
// $user = $_ENV['MYSQLUSER'];
// $pass = $_ENV['MYSQLPASSWORD'];
// $db   = $_ENV['MYSQLDATABASE'];
// $port = $_ENV['MYSQLPORT'];

// $conn = new mysqli($host, $user, $pass, $db);

// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }

// function getData(){
//     global $conn;
//     $sql = "SELECT * FROM tb_inventory order by id_barang desc";
//     $result = $conn->query($sql);
//         if ($result && $result->num_rows > 0) {
//         return $result->fetch_all(MYSQLI_ASSOC);
//     } else {
//         return [];
//     }
// }

// function getDataById($id){
//     global $conn;
//     $sql = "SELECT * FROM tb_inventory WHERE id_barang = $id";
//     $result = $conn->query($sql);
//     if ($result && $result->num_rows > 0) {
//         return $result->fetch_assoc();
//     } else {
//         return [];
//     }
// }

// function insertData($data){
//     global $conn;
//     $kode_barang = $data['kode_barang'];
//     $nama_barang = $data['nama_barang'];
//     $jumlah_barang = $data['jumlah_barang'];
//     $satuan_barang = $data['satuan_barang'];
//     $harga_beli = (int)$data['harga_beli'];
//     $status_barang = $data['status_barang'];

//     $sql = "INSERT INTO tb_inventory (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang) VALUES ('$kode_barang', '$nama_barang', '$jumlah_barang', '$satuan_barang', '$harga_beli', '$status_barang')";
    
//     if ($conn->query($sql) === TRUE) {
//         return true;
//     } else {
//         return false;
//     }
// }

// function updateData($data){
//     global $conn;
//     $id_barang = $data['id_barang'];
//     $kode_barang = $data['kode_barang'];
//     $nama_barang = $data['nama_barang'];
//     $jumlah_barang = $data['jumlah_barang'];
//     $satuan_barang = $data['satuan_barang'];
//     $harga_beli = (int)$data['harga_beli'];
//     $status_barang = $data['status_barang'];

//     $sql = "UPDATE tb_inventory SET kode_barang='$kode_barang', nama_barang='$nama_barang', jumlah_barang='$jumlah_barang', satuan_barang='$satuan_barang', harga_beli='$harga_beli', status_barang='$status_barang' WHERE id_barang=$id_barang";
    
//     if ($conn->query($sql) === TRUE) {
//         return true;
//     } else {
//         return false;
//     }
// }

// function deleteData($id){
//     global $conn;

//     $sql = "DELETE FROM tb_inventory WHERE id_barang=$id";
//     if ($conn->query($sql) === TRUE) {
//         return true;
//     } else {
//         return false;
//     }
// }

?>