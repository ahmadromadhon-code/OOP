<?php
require_once 'Jurusan.php';
$jurusan = new Jurusan($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $kode_jurusan = $_POST['kode_jurusan'];
    
    if ($id) {
        $jurusan->update($id, $nama_jurusan, $kode_jurusan);
    } else {
        $jurusan->insert($nama_jurusan, $kode_jurusan);
    }
    header("Location: index_jurusan.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $success = $jurusan->delete($_GET['hapus']);
    if (!$success) {
        $_SESSION['error'] = "Jurusan tidak dapat dihapus karena masih digunakan";
    }
    header("Location: index_jurusan.php");
    exit;
}
?>