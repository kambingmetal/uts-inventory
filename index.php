<?php 
include 'koneksi.php';

$dt_barang = getData();

$is_tambah_stok = false;
$id_tambah_stok = null;

if(!empty($_POST)){
    $action = $_POST['action'];
    if($action == 'delete'){
        $key = $_POST['key'];
        $return = deleteData($key);
        if($return){
            echo "<script>alert('Data berhasil dihapus'); window.location.href=''</script>";
        }else{
            echo "<script>alert('Data gagal dihapus');</script>";
        }
    } else if ($action == 'tambah_stok'){
        $is_tambah_stok = true;
        $id_tambah_stok = $_POST['key'];
    } else if ($action == 'simpan_stok') {
        $key = $_POST['key'];
        $data = getDataById($key);
        $data['jumlah_barang'] = $_POST['jumlah_barang'];
        $return = updateData($data);
        if($return){
            echo "<script>alert('Stok berhasil disimpan'); window.location.href=''</script>";
        }else{
            echo "<script>alert('Stok gagal disimpan');</script>";
        }
    }
}
?>

<html lang="en">

<body>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap demo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    
        </head>

        <body>
            <?php include 'layout/nav.php';?>
            <main class="mt-4">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <h3>Data Barang</h3>
                        <a href="data_barang.php" class="btn btn-success btn-md pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Barang</a>
                    </div>
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Satuan</th>
                            <th>Harga Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($dt_barang as $key => $value): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value['kode_barang'] ?></td>
                                    <td><?= $value['nama_barang'] ?></td>
                                    <td>
                                        <?php if ($is_tambah_stok && $id_tambah_stok == $value['id_barang']) : ?>
                                            <input type="number" name="jumlah_barang" class="form-control" id="jumlah_barang_edit" value="<?= $value['jumlah_barang'] ?>" placeholder="Jumlah Barang" required>
                                        <?php else: ?>  
                                         <?= $value['jumlah_barang'] ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $value['satuan_barang'] ?></td>
                                    <td>Rp. <?= number_format($value['harga_beli']) ?></td>
                                    <td><?= $value['status_barang'] ? 'Available' : 'Not-Available' ?></td>
                                    <td>
                                        <?php if ($is_tambah_stok && $id_tambah_stok == $value['id_barang']) : ?>
                                            <button class="btn btn-success btn-sm" onclick="simpanStok('<?= $value['id_barang'] ?>')">Simpan</button>
                                        <?php else: ?>
                                            <a class="btn btn-warning btn-sm" href="data_barang.php/<?= $value['id_barang'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger btn-sm" onclick="deleteBarang('<?= $value['id_barang'] ?>', '<?= $value['kode_barang'] . ' - ' . $value['nama_barang'] ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a class="btn btn-info btn-sm text-white" onclick="tambahStok('<?= $value['id_barang'] ?>')">Tambah Stok</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <form action="" method="POST">
                    <input type="text" name="action" id="action" hidden>
                    <input type="text" name="key" id="key" hidden>
                    <input type="text" name="jumlah_barang" id="jumlah_barang" hidden>
                </form>
            </main>
        </body>
    
    </html>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script>	
        let table = new DataTable('#dataTable');

        function deleteBarang(key, name){
            let action = confirm('Apakah anda yakin ingin menghapus data barang ' + name + ' ?');
            if (action) {
                $('#action').val('delete');
                $('#key').val(key);
                $('form').submit();
            }
        }

        function tambahStok(key){
            $('#action').val('tambah_stok');
            $('#key').val(key);
            $('form').submit();
        }

        function simpanStok(key){
            let jumlah_barang = $('#jumlah_barang_edit').val();
            $('#action').val('simpan_stok');
            $('#key').val(key);
            $('#jumlah_barang').val(jumlah_barang);
            $('form').submit();
        }
    </script>
</body>

</html>