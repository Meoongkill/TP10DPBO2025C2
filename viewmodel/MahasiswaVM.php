<?php
require_once __DIR__ . '/../model/Mahasiswa.php';
require_once __DIR__ . '/../model/Orientasi.php';
require_once __DIR__ . '/../model/Waifu.php';

class MahasiswaVM {
    private $model;
    private $orientasiModel;
    private $waifuModel;

    public function __construct() {
        $this->model = new Mahasiswa();
        $this->orientasiModel = new Orientasi();
        $this->waifuModel = new Waifu();
    }

    public function getAllMahasiswa() {
        return $this->model->getAll();
    }

    public function getMahasiswaById($id) {
        return $this->model->getById($id);
    }

    public function getAllOrientasi() {
        return $this->orientasiModel->getAll();
    }

    public function getAllWaifu() {
        return $this->waifuModel->getAll();
    }

    public function createMahasiswa($data) {
        if (empty($data['name']) || empty($data['nim'])) {
            return ['success' => false, 'message' => 'Nama dan NIM tidak boleh kosong'];
        }
        
        $result = $this->model->create($data);
        return [
            'success' => $result,
            'message' => $result ? 'Mahasiswa berhasil ditambahkan' : 'Gagal menambahkan mahasiswa'
        ];
    }

    public function updateMahasiswa($id, $data) {
        if (empty($data['name']) || empty($data['nim'])) {
            return ['success' => false, 'message' => 'Nama dan NIM tidak boleh kosong'];
        }
        
        $result = $this->model->update($id, $data);
        return [
            'success' => $result,
            'message' => $result ? 'Mahasiswa berhasil diupdate' : 'Gagal mengupdate mahasiswa'
        ];
    }

    public function deleteMahasiswa($id) {
        $result = $this->model->delete($id);
        return [
            'success' => $result,
            'message' => $result ? 'Mahasiswa berhasil dihapus' : 'Gagal menghapus mahasiswa'
        ];
    }
}
?>