<?php
require_once 'db.php';

class Nilai {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT n.*, m.nama as nama_mahasiswa, mk.nama_mk 
                                 FROM nilai n
                                 JOIN mahasiswa m ON n.mahasiswa_id = m.id
                                 JOIN mata_kuliah mk ON n.mata_kuliah_id = mk.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM nilai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($mahasiswa_id, $mata_kuliah_id, $nilai, $semester) {
        $stmt = $this->db->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah_id, nilai, semester) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$mahasiswa_id, $mata_kuliah_id, $nilai, $semester]);
    }

    public function update($id, $mahasiswa_id, $mata_kuliah_id, $nilai, $semester) {
        $stmt = $this->db->prepare("UPDATE nilai SET mahasiswa_id = ?, mata_kuliah_id = ?, nilai = ?, semester = ? WHERE id = ?");
        return $stmt->execute([$mahasiswa_id, $mata_kuliah_id, $nilai, $semester, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM nilai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>