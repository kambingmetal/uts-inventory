<?php

include 'koneksi.php';
global $conn;


$sql = "INSERT INTO tb_inventory (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang) VALUES
('BRG001', 'Pulpen Hitam', 100, 'pcs', 1500.00, 1),
('BRG002', 'Buku Tulis', 200, 'pcs', 3500.00, 1),
('BRG003', 'Pensil 2B', 150, 'pcs', 1200.00, 1),
('BRG004', 'Penghapus', 75, 'pcs', 800.00, 1),
('BRG005', 'Rautan', 60, 'pcs', 1000.00, 1),
('BRG006', 'Stabilo', 90, 'pcs', 5000.00, 1),
('BRG007', 'Map Plastik', 40, 'pcs', 2000.00, 1),
('BRG008', 'Kertas A4', 300, 'rim', 45000.00, 1),
('BRG009', 'Spidol Board', 120, 'pcs', 5500.00, 1),
('BRG010', 'Tinta Printer', 50, 'botol', 65000.00, 1),
('BRG011', 'Lakban Bening', 80, 'roll', 2500.00, 1),
('BRG012', 'Gunting Kertas', 35, 'pcs', 7500.00, 1),
('BRG013', 'Penggaris 30cm', 110, 'pcs', 2000.00, 1),
('BRG014', 'Binder Clip', 130, 'box', 9000.00, 1),
('BRG015', 'Sticky Note', 95, 'pad', 3000.00, 1);
";

$conn->query($sql);
if ($conn->affected_rows > 0) {
    echo "Data barang berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data barang: " . $conn->error;
}

