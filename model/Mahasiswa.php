<?php
require_once __DIR__ . '/../config/Database.php';

class Mahasiswa {
    private $db;
    private $table = 'mahasiswa';

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $stmt = $this->db->prepare("
            SELECT m.*, o.name as orientasi_name, w.name as waifu_name 
            FROM {$this->table} m 
            JOIN orientasi o ON m.orientasi_id = o.id 
            JOIN waifu w ON m.waifu_id = w.id 
            ORDER BY m.name
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT m.*, o.name as orientasi_name, w.name as waifu_name 
            FROM {$this->table} m 
            JOIN orientasi o ON m.orientasi_id = o.id 
            JOIN waifu w ON m.waifu_id = w.id 
            WHERE m.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (name, nim, phone, orientasi_id, waifu_id) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['name'], 
            $data['nim'], 
            $data['phone'], 
            $data['orientasi_id'], 
            $data['waifu_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE {$this->table} 
            SET name = ?, nim = ?, phone = ?, orientasi_id = ?, waifu_id = ? 
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['name'], 
            $data['nim'], 
            $data['phone'], 
            $data['orientasi_id'], 
            $data['waifu_id'], 
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>