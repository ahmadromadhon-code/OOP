<?php
require_once 'Nilai.php';
require_once 'Mahasiswa.php';
require_once 'MataKuliah.php';

$nilai = new Nilai($pdo);
$mahasiswa = new Mahasiswa($pdo);
$matkul = new MataKuliah($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'mahasiswa_id' => '',
    'mata_kuliah_id' => '',
    'nilai' => '',
    'semester' => ''
];
if ($id) {
    $data = $nilai->getById($id);
}

$mahasiswaList = $mahasiswa->getAll();
$matkulList = $matkul->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Tambah' ?> Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Nilai</h2>
    <form action="proses_nilai.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                <?php foreach ($mahasiswaList as $mhs): ?>
                <option value="<?= $mhs['id'] ?>" <?= ($mhs['id'] == $data['mahasiswa_id']) ? 'selected' : '' ?>>
                    <?= $mhs['nama'] ?> (<?= $mhs['nim'] ?>)
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php foreach ($matkulList as $mk): ?>
                <option value="<?= $mk['id'] ?>" <?= ($mk['id'] == $data['mata_kuliah_id']) ? 'selected' : '' ?>>
                    <?= $mk['nama_mk'] ?> (<?= $mk['kode_mk'] ?>)
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" step="0.01" min="0" max="100" name="nilai" class="form-control" required value="<?= $data['nilai'] ?>">
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" required value="<?= $data['semester'] ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index_nilai.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>