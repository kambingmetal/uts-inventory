<?php 
include 'koneksi.php';

$dt_barang = getData();

if(!empty($_POST)){
    $action = $_POST['action'];
    if ($action == 'pinjam'){
        $data = getDataById($_POST['id_barang']);
        $sisa_barang = $data['jumlah_barang'] - $_POST['jumlah_barang'];
        if($sisa_barang < 0){
            echo "<script>alert('Stok tidak cukup');  window.location.href='peminjaman.php';</script>";

            return;
        }
       
        if ($sisa_barang == 0){
            $data['status_barang'] = 0;
        }
        $data['jumlah_barang'] = $sisa_barang;

        $return = updateData($data);
        if($return){
            echo "<script>alert('Barang berhasil dipinjam'); window.location.href=''</script>";
        }else{
            echo "<script>alert('Barang gagal dipinjam');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'layout/nav.php'; ?>
    <main>
        <div class="container mt-5 col-md-6 mx-auto">
            
            <form method="post">
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Cari Barang</label>
                    <select name="id_barang" class="form-control">
                        <option value="" selected disabled>Pilih barang</option>
                        <?php foreach ($dt_barang as $barang): ?>
                            <option value="<?= $barang['id_barang'] ?>" <?= $barang['status_barang'] == '0' ? 'disabled' : '' ?>>
                                <?= $barang['kode_barang'] . ' - ' . $barang['nama_barang'] . ' (' . ($barang['status_barang'] == '1' ? 'Available' : 'Not-Available')  . ')'?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required value="<?= $data['jumlah_barang'] ?? null ?>">
                    </div>
                </div>
                <input type="text" name="action" id="action" value="pinjam" hidden>
                <button type="button" class="btn btn-primary" onclick="pinjam()">Pinjam</button>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    function pinjam(){
        $("form").submit();
    }
</script>

</html>