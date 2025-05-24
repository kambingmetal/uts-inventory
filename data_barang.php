<?php

include 'koneksi.php';

$is_edit = false;
if (isset($_SERVER['PATH_INFO'])) {
    $pathInfo = trim($_SERVER['PATH_INFO'], '/');
    $id = intval($pathInfo);
    if (!empty($id)){
        $is_edit = true;
    }
} 

$data = [];
if ($is_edit) {
    $data = getDataById($id);
}


if(!empty($_POST)){
    $action = $_POST['action'];
    if($action == 'save'){
        unset($_POST['action']);
        $return = insertData($_POST);
        if($return){
            echo "<script>alert('Data berhasil disimpan'); window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Data gagal disimpan');</script>";
            $data = $_POST;
        }
    }

    if($action == 'update'){
        unset($_POST['action']);
        $return = updateData($_POST + ['id_barang' => $id]);
        if($return){
            echo "<script>alert('Data berhasil diupdate');</script>";
        }else{
            echo "<script>alert('Data gagal diupdate');</script>";
            $data = $_POST;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'layout/nav.php'; ?>
    <main>
        <div class="container mt-5 col-md-6 mx-auto">
            <?php if ($is_edit): ?>
                <h2 class="mb-4">Edit Barang</h2>
            <?php else: ?>
                <h2 class="mb-4">Tambah Barang</h2>
            <?php endif; ?>
            
            <form method="post">
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" required value="<?= $data['kode_barang'] ?? null ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?= $data['nama_barang'] ?? null ?>">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required value="<?= $data['jumlah_barang'] ?? null ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan_barang" class="form-label">Satuan Barang</label>
                        <select class="form-select" id="satuan_barang" name="satuan_barang" required>
                            <option value="" selected disabled>Pilih satuan</option>
                            <option value="pcs" <?= isset($data['satuan_barang']) && $data['satuan_barang'] == 'pcs' ? 'selected' : '' ?>>pcs</option>
                            <option value="box" <?= isset($data['satuan_barang']) && $data['satuan_barang'] == 'box' ? 'selected' : '' ?>>box</option>
                            <option value="roll" <?= isset($data['satuan_barang']) && $data['satuan_barang'] == 'roll' ? 'selected' : '' ?>>roll</option> 
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" required value="<?= !empty($data['harga_beli']) ? (int) $data['harga_beli'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="status_barang" class="form-label">Status Barang</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_barang" id="status_available" value="1" <?= isset($data['status_barang']) && $data['status_barang'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_available">Available</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_barang" id="status_not_available" value="0" <?= isset($data['status_barang']) && $data['status_barang'] == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_not_available">Not Available</label>
                        </div>
                    </div>
                </div>
                <input type="text" name="action" id="action" hidden>
                <button type="button" class="btn btn-primary" <?= $is_edit ? 'data-type="update"' : 'data-type="save"' ?>><?= $is_edit ? 'Update' : 'Simpan' ?></button>
                <a href="/inventory" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('[data-type="save"]').click(function() {
            var kode_barang = $("#kode_barang").val();
            var nama_barang = $("#nama_barang").val();
            var jumlah_barang = $("#jumlah_barang").val();
            var satuan_barang = $("#satuan_barang").val();
            var harga_beli = $("#harga_beli").val();
            var status_barang = $("#status_barang").val();
            $("#action").val("save");

            if (kode_barang == "" || nama_barang == "" || jumlah_barang == "" || satuan_barang == "" || harga_beli == "" || status_barang == "") {
                alert("Semua field harus diisi!");
                return false;
            } else {
                // submit the form
                $("form").submit();
            }
        });

        $('[data-type="update"]').click(function() {
            var kode_barang = $("#kode_barang").val();
            var nama_barang = $("#nama_barang").val();
            var jumlah_barang = $("#jumlah_barang").val();
            var satuan_barang = $("#satuan_barang").val();
            var harga_beli = $("#harga_beli").val();
            var status_barang = $("input[name='status_barang']:checked").val();
            $("#action").val("update");

            if (kode_barang == "" || nama_barang == "" || jumlah_barang == "" || satuan_barang == "" || harga_beli == "" || status_barang == "") {
                alert("Semua field harus diisi!");
                return false;
            } else {
                // submit the form
                $("form").submit();
            }
        });
    </script>
</body>

</html>