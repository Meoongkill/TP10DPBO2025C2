<?php
require_once __DIR__ . '/../viewmodel/OrientasiVM.php';

$vm = new OrientasiVM();
$orientasi = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $isEdit = true;
    $orientasi = $vm->getOrientasiById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = ['name' => $_POST['name']];
    
    if ($isEdit) {
        $result = $vm->updateOrientasi($_GET['id'], $data);
    } else {
        $result = $vm->createOrientasi($data);
    }
    
    if ($result['success']) {
        header('Location: Orientasi_list.php');
        exit;
    } else {
        $message = $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Orientasi</title>
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
    <h1><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Orientasi</h1>

    <?php if (isset($message)): ?>
        <div class="message error"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Nama Orientasi:</label>
            <select name="name" id="name" required>
                <option value="">Pilih Orientasi</option>
                <option value="Harem" <?php echo ($orientasi && $orientasi['name'] == 'Harem') ? 'selected' : ''; ?>>Harem</option>
                <option value="NTR" <?php echo ($orientasi && $orientasi['name'] == 'NTR') ? 'selected' : ''; ?>>NTR</option>
                <option value="Vanilla" <?php echo ($orientasi && $orientasi['name'] == 'Vanilla') ? 'selected' : ''; ?>>Vanilla</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Simpan'; ?></button>
        <a href="Orientasi_list.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>