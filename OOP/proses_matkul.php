<?php
require_once 'MataKuliah.php';

$matkul = new MataKuliah($pdo);

// Simpan atau Update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $jurusan_id = $_POST['jurusan_id'];
    
    try {
        if ($id) {
            $success = $matkul->update($id, $kode_mk, $nama_mk, $sks, $jurusan_id);
        } else {
            $success = $matkul->insert($kode_mk, $nama_mk, $sks, $jurusan_id);
        }
        
        if ($success) {
            $_SESSION['success'] = "Data berhasil disimpan";
        } else {
            $_SESSION['error'] = "Gagal menyimpan data";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
    
    header("Location: index_matkul.php");
    exit;
}

// Hapus
if (isset($_GET['hapus'])) {
    try {
        $success = $matkul->delete($_GET['hapus']);
        if ($success) {
            $_SESSION['success'] = "Data berhasil dihapus";
        } else {
            $_SESSION['error'] = "Gagal menghapus data (mungkin masih terkait dengan nilai)";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
    
    header("Location: index_matkul.php");
    exit;
}