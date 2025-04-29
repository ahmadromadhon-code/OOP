<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa($pdo);
$data = $mahasiswa->getAll();

$title = "Data Mahasiswa"; // For dynamic title in header
require_once 'header.php'; 
?>

<h2>Data Mahasiswa</h2>
<a href="form.php" class="btn btn-primary mb-2">+ Tambah Mahasiswa</a>

<?php if (empty($data)): ?>
    <div class="alert alert-info">Tidak ada data mahasiswa</div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $mhs): ?>
                <tr>
                    <td><?= htmlspecialchars($mhs['id']) ?></td>
                    <td><?= htmlspecialchars($mhs['nama']) ?></td>
                    <td><?= htmlspecialchars($mhs['nim']) ?></td>
                    <td><?= htmlspecialchars($mhs['jurusan'] ?? '-') ?></td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="form.php?id=<?= $mhs['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="proses.php?hapus=<?= $mhs['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php require_once 'footer.php'; ?>