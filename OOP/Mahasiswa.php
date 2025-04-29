<?php
require_once 'db.php';

class Mahasiswa {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    private function columnExists($table, $column) {
        $stmt = $this->db->prepare("SHOW COLUMNS FROM $table LIKE ?");
        $stmt->execute([$column]);
        return $stmt->rowCount() > 0;
    }
    
    public function getAll() {
        try {
            $stmt = $this->db->query("SELECT m.id, m.nama, m.nim, j.nama_jurusan as jurusan 
                                     FROM mahasiswa m 
                                     JOIN jurusan j ON m.jurusan_id = j.id");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->db->prepare("SELECT m.*, j.nama_jurusan as jurusan 
                                       FROM mahasiswa m 
                                       JOIN jurusan j ON m.jurusan_id = j.id 
                                       WHERE m.id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getById: " . $e->getMessage());
            return false;
        }
    }

    public function insert($nama, $nim, $jurusan_id) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, nim, jurusan_id) VALUES (?, ?, ?)");
        return $stmt->execute([$nama, $nim, $jurusan_id]);
    }

    public function update($id, $nama, $nim, $jurusan_id) {
        try {
            $stmt = $this->db->prepare("UPDATE mahasiswa 
                                       SET nama = ?, nim = ?, jurusan_id = ? 
                                       WHERE id = ?");
            return $stmt->execute([$nama, $nim, $jurusan_id, $id]);
        } catch (PDOException $e) {
            error_log("Error update: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        // Cek apakah mahasiswa memiliki nilai
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM nilai WHERE mahasiswa_id = ?");
        $stmt->execute([$id]);
        if ($stmt->fetchColumn() > 0) {
            return false; // Tidak bisa dihapus karena memiliki nilai
        }
        
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>