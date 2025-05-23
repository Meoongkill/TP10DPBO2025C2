<?php
require_once __DIR__ . '/../viewmodel/WaifuVM.php';

$vm = new WaifuVM();
$waifu = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $isEdit = true;
    $waifu = $vm->getWaifuById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = ['name' => $_POST['name']];
    
    if ($isEdit) {
        $result = $vm->updateWaifu($_GET['id'], $data);
    } else {
        $result = $vm->createWaifu($data);
    }
    
    if ($result['success']) {
        header('Location: Waifu_list.php');
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
    <title><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Waifu</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 300px; padding: 8px; }
        .btn { padding: 10px 15px; margin-right: 10px; text-decoration: none; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .message { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1><?php echo $isEdit ? 'Edit' : 'Tambah'; ?> Waifu</h1>

    <?php if (isset($message)): ?>
        <div class="message error"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Nama Waifu:</label>
            <input type="text" name="name" id="name" value="<?php echo $waifu ? htmlspecialchars($waifu['name']) : ''; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Simpan'; ?></button>
        <a href="Waifu_list.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>