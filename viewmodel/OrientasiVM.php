<?php
require_once __DIR__ . '/../model/Orientasi.php';

class OrientasiVM {
    private $model;

    public function __construct() {
        $this->model = new Orientasi();
    }

    public function getAllOrientasi() {
        return $this->model->getAll();
    }

    public function getOrientasiById($id) {
        return $this->model->getById($id);
    }

    public function createOrientasi($data) {
        if (empty($data['name'])) {
            return ['success' => false, 'message' => 'Nama orientasi tidak boleh kosong'];
        }
        
        $result = $this->model->create($data);
        return [
            'success' => $result,
            'message' => $result ? 'Orientasi berhasil ditambahkan' : 'Gagal menambahkan orientasi'
        ];
    }

    public function updateOrientasi($id, $data) {
        if (empty($data['name'])) {
            return ['success' => false, 'message' => 'Nama orientasi tidak boleh kosong'];
        }
        
        $result = $this->model->update($id, $data);
        return [
            'success' => $result,
            'message' => $result ? 'Orientasi berhasil diupdate' : 'Gagal mengupdate orientasi'
        ];
    }

    public function deleteOrientasi($id) {
        $result = $this->model->delete($id);
        return [
            'success' => $result,
            'message' => $result ? 'Orientasi berhasil dihapus' : 'Gagal menghapus orientasi'
        ];
    }
}
?>