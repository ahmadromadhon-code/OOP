<?php
require_once 'Nilai.php';
$nilai = new Nilai($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $mata_kuliah_id = $_POST['mata_kuliah_id'];
    $nilai_val = $_POST['nilai'];
    $semester = $_POST['semester'];
    
    if ($id) {
        $nilai->update($id, $mahasiswa_id, $mata_kuliah_id, $nilai_val, $semester);
    } else {
        $nilai->insert($mahasiswa_id, $mata_kuliah_id, $nilai_val, $semester);
    }
    header("Location: index_nilai.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    $nilai->delete($_GET['hapus']);
    header("Location: index_nilai.php");
    exit;
}
?>