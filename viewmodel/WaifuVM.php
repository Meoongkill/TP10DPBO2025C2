<?php
require_once __DIR__ . '/../model/Waifu.php';

class WaifuVM {
    private $model;

    public function __construct() {
        $this->model = new Waifu();
    }

    public function getAllWaifu() {
        return $this->model->getAll();
    }

    public function getWaifuById($id) {
        return $this->model->getById($id);
    }

    public function createWaifu($data) {
        if (empty($data['name'])) {
            return ['success' => false, 'message' => 'Nama waifu tidak boleh kosong'];
        }
        
        $result = $this->model->create($data);
        return [
            'success' => $result,
            'message' => $result ? 'Waifu berhasil ditambahkan' : 'Gagal menambahkan waifu'
        ];
    }

    public function updateWaifu($id, $data) {
        if (empty($data['name'])) {
            return ['success' => false, 'message' => 'Nama waifu tidak boleh kosong'];
        }
        
        $result = $this->model->update($id, $data);
        return [
            'success' => $result,
            'message' => $result ? 'Waifu berhasil diupdate' : 'Gagal mengupdate waifu'
        ];
    }

    public function deleteWaifu($id) {
        $result = $this->model->delete($id);
        return [
            'success' => $result,
            'message' => $result ? 'Waifu berhasil dihapus' : 'Gagal menghapus waifu'
        ];
    }
}
?>