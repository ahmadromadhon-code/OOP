<?php
require_once 'Nilai.php';
require_once 'Mahasiswa.php';
require_once 'MataKuliah.php';

$nilai = new Nilai($pdo);
$mahasiswa = new Mahasiswa($pdo);
$matkul = new MataKuliah($pdo);

$data = $nilai->getAll();
$mahasiswaList = $mahasiswa->getAll();
$matkulList = $matkul->getAll();

$title = "Data Mahasiswa"; 
require_once 'header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Data Nilai Mahasiswa</h2>
    <a href="form_nilai.php" class="btn btn-primary mb-2">+ Tambah Nilai</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_mahasiswa'] ?></td>
                <td><?= $row['nama_mk'] ?></td>
                <td><?= $row['nilai'] ?></td>
                <td><?= $row['semester'] ?></td>
                <td>
                    <a href="form_nilai.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses_nilai.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>