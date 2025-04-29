<?php
require_once 'MataKuliah.php';
require_once 'Jurusan.php';

$matkul = new MataKuliah($pdo);
$jurusan = new Jurusan($pdo);

$id = $_GET['id'] ?? '';
$data = [
    'kode_mk' => '',
    'nama_mk' => '',
    'sks' => '',
    'jurusan_id' => ''
];

if ($id) {
    $data = $matkul->getById($id);
    if (!$data) {
        header("Location: index_matkul.php");
        exit;
    }
}

$daftarJurusan = $jurusan->getAll();
$title = $id ? "Edit Mata Kuliah" : "Tambah Mata Kuliah";
require_once 'header.php';
?>

<h2 class="mb-4"><?= $title ?></h2>

<form action="proses_matkul.php" method="post" class="needs-validation" novalidate>
    <input type="hidden" name="id" value="<?= $id ?>">
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" 
                   value="<?= htmlspecialchars($data['kode_mk']) ?>" required>
            <div class="invalid-feedback">
                Harap isi kode mata kuliah
            </div>
        </div>
        
        <div class="col-md-6">
            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" 
                   value="<?= htmlspecialchars($data['nama_mk']) ?>" required>
            <div class="invalid-feedback">
                Harap isi nama mata kuliah
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="sks" class="form-label">SKS</label>
            <select class="form-select" id="sks" name="sks" required>
                <option value="">Pilih SKS</option>
                <?php for ($i=1; $i<=6; $i++): ?>
                <option value="<?= $i ?>" <?= ($i == $data['sks']) ? 'selected' : '' ?>>
                    <?= $i ?> SKS
                </option>
                <?php endfor; ?>
            </select>
            <div class="invalid-feedback">
                Harap pilih jumlah SKS
            </div>
        </div>
        
        <div class="col-md-6">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                <option value="">Pilih Jurusan</option>
                <?php foreach ($daftarJurusan as $j): ?>
                <option value="<?= $j['id'] ?>" 
                    <?= ($j['id'] == $data['jurusan_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($j['nama_jurusan']) ?>
                </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Harap pilih jurusan
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-between">
        <a href="index_matkul.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <button type="submit" name="simpan" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
    </div>
</form>

<script>
// Form validation
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<?php require_once 'footer.php'; ?>