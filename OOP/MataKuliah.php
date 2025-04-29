<?php
require_once 'db.php';

class MataKuliah {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT mk.*, j.nama_jurusan 
                                 FROM mata_kuliah mk 
                                 JOIN jurusan j ON mk.jurusan_id = j.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM mata_kuliah WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($kode_mk, $nama_mk, $sks, $jurusan_id) {
        $stmt = $this->db->prepare("INSERT INTO mata_kuliah 
                                   (kode_mk, nama_mk, sks, jurusan_id) 
                                   VALUES (?, ?, ?, ?)");
        return $stmt->execute([$kode_mk, $nama_mk, $sks, $jurusan_id]);
    }

    public function update($id, $kode_mk, $nama_mk, $sks, $jurusan_id) {
        $stmt = $this->db->prepare("UPDATE mata_kuliah 
                                   SET kode_mk = ?, nama_mk = ?, sks = ?, jurusan_id = ? 
                                   WHERE id = ?");
        return $stmt->execute([$kode_mk, $nama_mk, $sks, $jurusan_id, $id]);
    }

    public function delete($id) {
        // Cek apakah mata kuliah terkait dengan nilai
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM nilai WHERE mata_kuliah_id = ?");
        $stmt->execute([$id]);
        if ($stmt->fetchColumn() > 0) {
            return false;
        }
        
        $stmt = $this->db->prepare("DELETE FROM mata_kuliah WHERE id = ?");
        return $stmt->execute([$id]);
    }
}