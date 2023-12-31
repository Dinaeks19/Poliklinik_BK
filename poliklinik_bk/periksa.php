<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("koneksi.php");

if (!isset($_SESSION['username'])) {
    header("Location: LoginUser.php");
    exit;
}

// Continue with the code if already logged in

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap offline -->

    <link rel="stylesheet" href="assets/css/bootstrap.css"> 

    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">   

</head>
<body>
<div class="container">
<hr>    

<form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">
<?php
    $id_daftar_poli= '';
    $tgl_periksa= '';
    $catatan = '';
    $biaya_periksa ='';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM periksa
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $id_daftar_poli = $row['id_daftar_poli'];
            $tgl_periksa = $row['tgl_periksa'];
            $catatan = $row['catatan'];
            $biaya_periksa= $row['biaya_periksa'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputDaftarPoli" class="form-label fw-bold">
            ID Daftar Poli
        </label>
        <select class="form-control" name="id_daftar_poli">
        <?php
        $selected = '';
        $daftar_poli = mysqli_query($mysqli, "SELECT * FROM daftar_poli");
        while ($data = mysqli_fetch_array($daftar_poli)) {
            if ($data['id'] == $daftar_poli) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?php echo $data['id_pasien'] ?></option>
        <?php
        }
        ?>
    </select>
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputTanggal" class="form-label fw-bold">
            Tanggal Periksa
        </label>
        <input type="datetime-local" class="form-control" name="tgl_periksa" id="inputTanggal" value="<?php echo $tgl_periksa; ?>">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="inputCatatan" class="form-label fw-bold">
            Catatan
        </label>
        <textarea class="form-control" name="catatan" id="inputCatatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="inputBiaya" class="form-label fw-bold">
            Biaya Periksa
        </label>
        <input type="text" class="form-control" name="biaya_periksa" id="inputBiaya" value="<?php echo $biaya_periksa; ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>

</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Daftar Poli</th>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">Catatan</th>
            <th scope="col">Biaya Periksa</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        $result = mysqli_query(
            $mysqli, "SELECT * FROM periksa ORDER BY tgl_periksa DESC"
        );
        $no = 1;
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $data['id_daftar_poli'] ?></td>
                <td><?php echo $data['tgl_periksa'] ?></td>
                <td><?php echo $data['catatan'] ?></td>
                <td><?php echo $data['biaya_periksa'] ?></td>
                <td>
                    <a class="btn btn-success rounded-pill px-3" href="index.php?page=periksa&id=<?php echo $data['id'] ?>">Ubah</a>
                    <a class="btn btn-danger rounded-pill px-3" href="index.php?page=periksa&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE periksa SET 
                                        id_daftar_poli = '" . $_POST['id_daftar_poli'] . "',
                                        tgl_periksa = '" . $_POST['tgl_periksa'] . "',
                                        catatan = '" . $_POST['catatan'] . "',
                                        biaya_periksa = '" . $_POST['biaya_periksa'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO periksa(id_daftar_poli, tgl_periksa, catatan, biaya_periksa) 
                                        VALUES ( 
                                            '" . $_POST['id_daftar_poli'] . "',
                                            '" . $_POST['tgl_periksa'] . "',
                                            '" . $_POST['catatan'] . "',
                                            '" . $_POST['biaya_periksa'] . "'
                                            )");
    }

    echo "<script> 
            document.location='index.php?page=periksa';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM periksa WHERE id = '" . $_GET['id'] . "'");
    }
    echo "<script> 
            document.location='index.php?page=periksa';
            </script>";
}

?>
</body>
</html>
