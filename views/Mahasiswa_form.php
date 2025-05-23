<?php
require_once __DIR__ . '/../viewmodel/MahasiswaVM.php';

$vm = new MahasiswaVM();
$mahasiswa = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $isEdit = true;
    $mahasiswa = $vm->getMahasiswaById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'orientasi_id' => $_POST['orientasi_id'],
        'waifu_id' => $_POST['waifu_id']
    ];
    
    if ($isEdit) {
        $result = $vm->updateMahasiswa($_GET['id'], $data);
    } else {
        $result = $vm->createMahasiswa($data);
    }
    
    if ($result['success']) {
        header('Location: Mahasiswa_list.php');
        exit;
    } else {
        $message = $result['message'];
    }
}

$orientasiList = $vm->getAllOrientasi();
$waifuList = $vm->getAllWaifu();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, select { width: 300px; padding: 8px; }
        .btn { padding: 10px 15px; margin-right: 10px; text-decoration: none; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .message { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Mahasiswa</h1>

    <?php if (isset($message)): ?>
        <div class="message error"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" value="<?php echo $mahasiswa ? htmlspecialchars($mahasiswa['name']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" value="<?php echo $mahasiswa ? htmlspecialchars($mahasiswa['nim']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Telepon:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $mahasiswa ? htmlspecialchars($mahasiswa['phone']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="orientasi_id">Orientasi:</label>
            <select name="orientasi_id" id="orientasi_id" required>
                <option value="">Pilih Orientasi</option>
                <?php foreach ($orientasiList as $orientasi): ?>
                    <option value="<?php echo $orientasi['id']; ?>" 
                            <?php echo ($mahasiswa && $mahasiswa['orientasi_id'] == $orientasi['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($orientasi['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="waifu_id">Waifu:</label>
            <select name="waifu_id" id="waifu_id" required>
                <option value="">Pilih Waifu</option>
                <?php foreach ($waifuList as $waifu): ?>
                    <option value="<?php echo $waifu['id']; ?>" 
                            <?php echo ($mahasiswa && $mahasiswa['waifu_id'] == $waifu['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($waifu['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Simpan'; ?></button>
        <a href="Mahasiswa_list.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>