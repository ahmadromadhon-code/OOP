<?php
require_once 'Mahasiswa.php';
$mahasiswa = new Mahasiswa($pdo);
// Simpan atau Update
if (isset($_POST['simpan'])) {
 $id = $_POST['id'];
 $nama = $_POST['nama'];
 $nim = $_POST['nim'];
 $jurusan_id = $_POST['jurusan_id'];
 if ($id) {
    $success = $mahasiswa->update($id, $nama, $nim, $jurusan_id);
} else {
    $success = $mahasiswa->insert($nama, $nim, $jurusan_id);
}

if ($success) {
    header("Location: index.php");
    exit;
} else {
    die("Gagal menyimpan data");
}
}
// Hapus
if (isset($_GET['hapus'])) {
 $mahasiswa->delete($_GET['hapus']);
 header("Location: index.php");
 exit;
}
?>