<?php
require_once 'MataKuliah.php';
require_once 'Jurusan.php';

$matkul = new MataKuliah($pdo);
$jurusan = new Jurusan($pdo);

$data = $matkul->getAll();
$title = "Data Mata Kuliah";
require_once 'header.php';
?>

<h2 class="mb-4">Data Mata Kuliah</h2>
<a href="form_matkul.php" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Mata Kuliah
</a>

<?php if (empty($data)): ?>
    <div class="alert alert-info">Tidak ada data mata kuliah</div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th width="5%">No</th>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Jurusan</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['kode_mk']) ?></td>
                    <td><?= htmlspecialchars($row['nama_mk']) ?></td>
                    <td><?= htmlspecialchars($row['sks']) ?></td>
                    <td><?= htmlspecialchars($row['nama_jurusan']) ?></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="form_matkul.php?id=<?= $row['id'] ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="proses_matkul.php?hapus=<?= $row['id'] ?>" 
                               class="btn btn-danger"
                               onclick="return confirm('Hapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php require_once 'footer.php'; ?>