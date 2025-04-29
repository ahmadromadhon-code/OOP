<?php
require_once 'db.php';

class Jurusan {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM jurusan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM jurusan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nama_jurusan, $kode_jurusan) {
        $stmt = $this->db->prepare("INSERT INTO jurusan (nama_jurusan, kode_jurusan) VALUES (?, ?)");
        return $stmt->execute([$nama_jurusan, $kode_jurusan]);
    }

    public function update($id, $nama_jurusan, $kode_jurusan) {
        $stmt = $this->db->prepare("UPDATE jurusan SET nama_jurusan = ?, kode_jurusan = ? WHERE id = ?");
        return $stmt->execute([$nama_jurusan, $kode_jurusan, $id]);
    }

    public function delete($id) {
        // Cek apakah jurusan digunakan di tabel lain
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM mahasiswa WHERE jurusan_id = ?");
        $stmt->execute([$id]);
        if ($stmt->fetchColumn() > 0) {
            return false; // Tidak bisa dihapus karena digunakan
        }
        
        $stmt = $this->db->prepare("DELETE FROM jurusan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>