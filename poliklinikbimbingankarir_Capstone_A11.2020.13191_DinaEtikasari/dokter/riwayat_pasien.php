<?php
    include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Riwayat Periksa</title>
</head>

<body>
    <h2>Riwayat Periksa</h2>
    <br>
    <div class="container">
        <!-- Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Tanggal Periksa</th>
                    <th scope="col">Catatan/Keluhan</th>
                    <th scope="col">Obat</th>
                    <th scope="col">Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($mysqli, "SELECT pr.id, d.nama as 'nama_dokter', p.nama as 'nama_pasien', pr.tgl_periksa, pr.catatan, GROUP_CONCAT(o.nama_obat SEPARATOR ', ') as 'obat'
                                                    FROM periksa pr
                                                    LEFT JOIN dokter d ON pr.id_dokter = d.id
                                                    LEFT JOIN pasien p ON pr.id_pasien = p.id
                                                    LEFT JOIN detail_periksa dp ON pr.id = dp.id_periksa
                                                    LEFT JOIN obat o ON dp.id_obat = o.id
                                                    GROUP BY pr.id
                                                    ORDER BY pr.tgl_periksa DESC");

                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama_pasien'] ?></td>
                            <td><?php echo $data['nama_dokter'] ?></td>
                            <td><?php echo $data['tgl_periksa'] ?></td>
                            <td><?php echo $data['catatan'] ?></td>
                            <td><?php echo $data['obat'] ?></td>
                            <td>
                                <a class="btn btn-warning rounded-pill px-3" href="index.php?page=invoice&id=<?php echo $data['id'] ?>">Nota</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
